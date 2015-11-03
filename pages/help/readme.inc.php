<?php

$search = array('(CHANGELOG.md)', '(LICENSE.md)');
$replace = array('(index.php?page=markdown&subpage=help&chapter=changelog)', '(index.php?page=markdown&subpage=help&chapter=license)');

echo rex_markdown_utils::getHtmlFromMDFile('README.md', $search, $replace);

