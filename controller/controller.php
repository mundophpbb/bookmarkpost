<?php
/**
*
* Bookmark Post
* @copyright (c) 2016 SiteSplat All rights reserved
* @license Proprietary
*
*/

namespace mundophpbb\bookmarkpost\controller;

use phpbb\exception\http_exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class controller
{
	protected $user;
	protected $db;
	protected $auth;
	protected $request;
	protected $controller_helper;
	protected $posts_table;
	protected $post_bookmarks_table;
	protected $root_path;
	protected $php_ext;

	public function __construct(\phpbb\user $user, \phpbb\db\driver\driver_interface $db, \phpbb\auth\auth $auth, \phpbb\request\request $request, \phpbb\controller\helper $controller_helper, $posts_table, $post_bookmarks_table, $root_path, $php_ext)
	{
		$this->user = $user;
		$this->db = $db;
		$this->auth = $auth;
		$this->request = $request;
		$this->controller_helper = $controller_helper;
		$this->posts_table = $posts_table;
		$this->post_bookmarks_table = $post_bookmarks_table;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
	}

	private function init($post_id)
	{
		$this->user->add_lang_ext('mundophpbb/bookmarkpost', 'common');
		if ((int) $this->user->data['user_id'] === ANONYMOUS)
		{
			throw new http_exception(403, 'LOGIN_REQUIRED');
		}

		$sql = 'SELECT forum_id
				FROM ' . $this->posts_table . '
				WHERE post_id = ' . (int) $post_id;
		$this->db->sql_query($sql);
		$forum_id = $this->db->sql_fetchfield('forum_id');

		if ($forum_id === false)
		{
			throw new http_exception(404, 'NO_POST');
		}

		if (!$this->auth->acl_get('f_read', $forum_id))
		{
			throw new http_exception(403, 'SORRY_AUTH_READ');
		}
	}

	public function bookmark($post_id)
	{
		$this->init($post_id);

		$sql = 'SELECT post_id FROM ' . $this->post_bookmarks_table . '
			WHERE post_id = ' . (int) $post_id . ' AND user_id = ' . (int) $this->user->data['user_id'];
		$result = $this->db->sql_query($sql);
		$exists = $this->db->sql_fetchfield('post_id');
		$this->db->sql_freeresult($result);
		if ($exists === false)
		{
			$sql = 'INSERT INTO ' . $this->post_bookmarks_table . ' (post_id, user_id)
				VALUES (' . (int) $post_id . ', ' . (int) $this->user->data['user_id'] . ')';
			$this->db->sql_query($sql);
		}

		return $this->send_response($post_id, 'POST_BOOKMARK_ADDED', 'unbookmark');
	}

	public function unbookmark($post_id)
	{
		$this->init($post_id);

		$sql = 'DELETE FROM ' . $this->post_bookmarks_table . '
				WHERE user_id = ' . (int) $this->user->data['user_id'] . '
					AND post_id = ' . (int) $post_id;
		$this->db->sql_query($sql);

		return $this->send_response($post_id, 'POST_BOOKMARK_REMOVED', 'bookmark');
	}

	private function send_response($post_id, $lang, $new_command)
	{
		// Send a JSON response if an AJAX request was used
		if ($this->request->is_ajax())
		{
			return new JsonResponse(
				array(
					'MESSAGE_TITLE'		=> $this->user->lang('INFORMATION'),
					'MESSAGE_TEXT'		=> $this->user->lang($lang . '_AJAX'),
					'S_USER_WARNING'	=> false,
					'S_USER_NOTICE'		=> false,
					'REFRESH_DATA'		=> null,
					'POST_ID'			=> $post_id,
					'NEW_COMMAND'		=> $new_command,
					'NEW_HREF'			=> $this->controller_helper->route('mundophpbb_bookmarkpost_controller_' . $new_command, array('post_id' => $post_id)),
					'NEW_LANG'			=> ($new_command == 'bookmark') ? $this->user->lang('BOOKMARK_POST') : $this->user->lang('UNBOOKMARK_POST'),
				),
				200
			);
		}

		// Redirect the user back to their last viewed page (non-AJAX requests)
		$redirect_url = append_sid($this->root_path . 'viewtopic.' . $this->php_ext, 'p=' . $post_id . '#p' . $post_id);
		$message = $this->user->lang($lang, $redirect_url, append_sid($this->root_path . 'ucp.' . $this->php_ext, '?i=-mundophpbb-bookmarkpost-ucp-main_module&mode=post_bookmarks'));
		return $this->controller_helper->message($message);

	}
}
