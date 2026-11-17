<?php
/**
*
* Bookmark Post
* @copyright (c) 2016 SiteSplat All rights reserved
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
	'ACP_POSTBOOKMARK'  => 'PostBookmarks',
	'POSTBOOKMARK_NOTICE' => '<div class="phpinfo"><p>There are no specific ACP settings for this extension. Users can bookmark individual posts and review them under UCP Overview.</p></div>',
));
