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
	'POSTBOOKMARK_NOTICE' => '<div class="phpinfo"><p>Não existem configurações específicas no ACP para esta extensão. Os usuários podem favoritar postagens individuais e revisá-las no Painel de Controle do Usuário (UCP) em Visão Geral.</p></div>',
));