<?php
if (rex::isBackend()) {
	# if (!class_exists('MarkdownUtils')) {
	# 	require($addon_dir . '/classes/class.markdown_utils.inc.php');
	# }

  rex_view::addCssFile( $this->getAssetsUrl('markitup/skins/markitup/style.css'));
  rex_view::addCssFile( $this->getAssetsUrl('markitup/sets/markdown/style.css'));

  rex_view::addJsFile( $this->getAssetsUrl('markitup/jquery.markitup.js'));
  rex_view::addJsFile( $this->getAssetsUrl('markitup/sets/markdown/set.js'));
  rex_view::addJsFile( $this->getAssetsUrl('markdownplus.js'));
}

?>