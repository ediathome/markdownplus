<?php
// init addon
$REX['ADDON']['name']['markdown'] = 'MarkdownPlus';
$REX['ADDON']['page']['markdown'] = 'markdownplus';
$REX['ADDON']['version']['markdown'] = '0.1';
$REX['ADDON']['author']['markdown'] = 'ediathome';
$REX['ADDON']['supportpage']['markdown'] = 'forum.redaxo.org';
$REX['ADDON']['perm']['markdownplus'] = 'markdownplus[]';

// permissions
$REX['PERM'][] = 'markdownplus[]';

require($REX['INCLUDE_PATH'] . '/addons/markdownplus/classes/class.rex_markdownplus.inc.php');

if ($REX['REDAXO']) {
	// include patched parsedown class with rex_highlight() functionality for backend
	if (!class_exists('Parsedown')) {
		require($REX['INCLUDE_PATH'] . '/addons/markdown/lib/Parsedown.redaxo.php');
	}

	// includes
	require($REX['INCLUDE_PATH'] . '/addons/markdown/classes/class.rex_markdown_utils.inc.php');

	// add lang file
	$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/markdownplus/lang/');

	// add subpages
	$REX['ADDON']['markdown']['SUBPAGES'] = array(
		array('', $I18N->msg('markdownplus_start')),
		array('help', $I18N->msg('markdownplus_help'))
	);
} else {
	// include parsedown class for frontend
	if (!class_exists('Parsedown')) {
		require($REX['INCLUDE_PATH'] . '/addons/markdownplus/lib/Parsedown.php');
	}
}

// for frontend and backend
if (!class_exists('ParsedownExtra')) {
	require($REX['INCLUDE_PATH'] . '/addons/markdownplus/lib/ParsedownExtra.php');
}
?>
