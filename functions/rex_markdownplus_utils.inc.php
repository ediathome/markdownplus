<?php
function rex_markdownplus_utils_add_header_files($params)
{
    global $REX;
    $addon = 'markdownplus';

	$include_path = $REX['HTDOCS_PATH'].'/files/addons/markdownplus/markitup/';

    $params['subject'] .= "\n  ". '<link rel="stylesheet" type="text/css" href="'.$include_path.'skins/markitup/style.css" />';
    $params['subject'] .= "\n  ". '<link rel="stylesheet" type="text/css" href="'.$include_path.'sets/markdown/style.css" />';
    $params['subject'] .= "\n  ". '<script type="text/javascript" src="'.$include_path.'jquery.markitup.js"></script>';
    $params['subject'] .= "\n  ". '<script type="text/javascript" src="'.$include_path.'sets/markdown/set.js"></script>';
	$params['subject'] .= "\n  ". '<script language="javascript">
jQuery(document).ready(function()	{
    jQuery(\'.markdownplus\').markItUp(myMarkdownSettings);
});</script>';

    return $params['subject'];
}
