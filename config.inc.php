<?php
// init addon
$REX['ADDON']['name']['markdown'] = 'Markdown';
$REX['ADDON']['page']['markdown'] = 'markdown';
$REX['ADDON']['version']['markdown'] = '1.2.0';
$REX['ADDON']['author']['markdown'] = 'RexDude';
$REX['ADDON']['supportpage']['markdown'] = 'forum.redaxo.org';
$REX['ADDON']['perm']['markdown'] = 'markdown[]';

// permissions
$REX['PERM'][] = 'markdown[]';

require($REX['INCLUDE_PATH'] . '/addons/markdown/classes/class.rex_markdown.inc.php');

if ($REX['REDAXO']) {
	// include patched parsedown class with rex_highlight() functionality for backend
	if (!class_exists('Parsedown')) {
		require($REX['INCLUDE_PATH'] . '/addons/markdown/lib/Parsedown.redaxo.php');
	}

	// includes
	require($REX['INCLUDE_PATH'] . '/addons/markdown/classes/class.rex_markdown_utils.inc.php');

	// add lang file
	$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/markdown/lang/');

	// add subpages
	$REX['ADDON']['markdown']['SUBPAGES'] = array(
		array('', $I18N->msg('markdown_start')),
		array('help', $I18N->msg('markdown_help'))
	);
} else {
	// include parsedown class for frontend
	if (!class_exists('Parsedown')) {
		require($REX['INCLUDE_PATH'] . '/addons/markdown/lib/Parsedown.php');
	}
}

// for frontend and backend
if (!class_exists('ParsedownExtra')) {
	require($REX['INCLUDE_PATH'] . '/addons/markdown/lib/ParsedownExtra.php');
}
?>
