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
	'UCP_POST_BOOKMARKS_TITLE'	=> 'Gerenciar favoritos de postagens',

	'POST_BOOKMARKS_EXPLAIN'	=> 'Você pode favoritar postagens para referência futura. Marque a caixa de seleção de qualquer favorito que deseja excluir e, em seguida, pressione o botão <em>Remover favoritos marcados</em>.',
	'REMOVE_BOOKMARK_MARKED' => 'Remover favoritos selecionados',
	'NO_BOOKMARKS' => 'Nenhuma postagem favorita encontrada.',
	'REMOVE_SELECTED_BOOKMARKS' => 'Remover os favoritos selecionados?',
	'BOOKMARKS_REMOVED' => 'Os favoritos selecionados foram removidos.',
	'NO_BOOKMARKS_SELECTED' => 'Selecione pelo menos um favorito.',
	'POST_BOOKMARKS'			=> 'Favoritos de postagens',
));