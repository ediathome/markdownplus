<?php
// init addon
$REX['ADDON']['name']['markdownplus'] = 'MarkdownPlus';
$REX['ADDON']['page']['markdownplus'] = 'markdownplus';
$REX['ADDON']['version']['markdownplus'] = '0.1';
$REX['ADDON']['author']['markdownplus'] = 'ediathome';
$REX['ADDON']['supportpage']['markdownplus'] = 'forum.redaxo.org';
$REX['ADDON']['perm']['markdownplus'] = 'markdownplus[]';

// permissions
$REX['PERM'][] = 'markdownplus[]';

if (!class_exists('rex_markdown')) {
	require($REX['INCLUDE_PATH'] . '/addons/markdownplus/classes/class.rex_markdown.inc.php');
}

// for backend only
if ($REX['REDAXO']) {
	$addon_dir = $REX['INCLUDE_PATH'] . '/addons/markdownplus';
	
	// include patched parsedown class with rex_highlight() functionality for backend
	if (!class_exists('Parsedown')) {
		require($addon_dir . '/lib/Parsedown.redaxo.php');
	}

	// includes
	if (!class_exists('rex_markdown_utils')) {
		require($addon_dir . '/classes/class.rex_markdown_utils.inc.php');
	}

	require_once($addon_dir . '/functions/rex_markdownplus_utils.inc.php');
	// add javascript and css via PAGE_HEADER extension
	rex_register_extension('PAGE_HEADER', 'rex_markdownplus_utils_add_header_files');

	// add lang file
	$I18N->appendFile($addon_dir . '/lang/');

	// add subpages
	$REX['ADDON']['markdown']['SUBPAGES'] = array(
		array('', $I18N->msg('markdown_start')),
		array('help', $I18N->msg('markdown_help'))
	);
} else {
	// include parsedown class for frontend
	if (!class_exists('Parsedown')) {
		require($addon_dir . '/lib/Parsedown.php');
	}
}

// for frontend and backend
if (!class_exists('ParsedownExtra')) {
	require($addon_dir . '/lib/ParsedownExtra.php');
}
?>
