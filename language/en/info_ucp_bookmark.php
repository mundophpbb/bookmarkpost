<?php
/**
*
* Bookmark Post
*
* @copyright (c) 2016 SiteSplat All rights reserved
* Maintained by mundophpBB.
* @license Proprietary
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'UCP_POST_BOOKMARKS_TITLE'	=> 'Manage post bookmarks',

	'POST_BOOKMARKS_EXPLAIN'	=> 'You can bookmark posts for future reference. Select the checkbox for any bookmark you wish to delete, then press the <em>Remove marked bookmarks</em> button.',
	'REMOVE_BOOKMARK_MARKED' => 'Remove selected bookmarks',
	'NO_BOOKMARKS' => 'No bookmarked posts were found.',
	'REMOVE_SELECTED_BOOKMARKS' => 'Remove selected post bookmarks?',
	'BOOKMARKS_REMOVED' => 'The selected bookmarks were removed.',
	'NO_BOOKMARKS_SELECTED' => 'Select at least one bookmark.',
	'POST_BOOKMARKS'			=> 'Post bookmarks',
));
