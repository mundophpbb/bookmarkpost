<?php
/**
*
* Bookmark Post
*
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
	'BOOKMARK_POST_TITLE'			=> 'Gerenciar Marcadores de Postagem',
	'BOOKMARK_POST'			    	=> 'Favoritar esta postagem',
	'UNBOOKMARK_POST'		    	=> 'Remover marcador da postagem',
	'TOOLTIP_BOOMARKED_POSTS'   	=> 'Você tem uma ou mais postagens favoritadas neste tópico',
	'TOOLTIP_BOOMARKED_FORUM_POSTS' => 'Você tem uma ou mais postagens favoritadas neste fórum',
	'POST_BOOKMARKED'           	=> 'Você favoritou esta postagem',
	'POST_BOOKMARK_ADDED'	        => 'Postagem favoritada com sucesso.<br><br><a href="%1$s">Voltar ao tópico</a><br><br><a href="%2$s">Ver todas as postagens favoritadas</a>',
	'POST_BOOKMARK_ADDED_AJAX'		=> 'Postagem favoritada com sucesso.',
	'POST_BOOKMARK_REMOVED'	        => 'Marcador removido com sucesso.<br><br><a href="%1$s">Voltar ao tópico</a><br><br><a href="%2$s">Ver todas as postagens favoritadas</a>',
	'POST_BOOKMARK_REMOVED_AJAX'	=> 'Marcador removido com sucesso.',
));