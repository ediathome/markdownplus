/*global
jQuery, $, alert
*/
// Copyright (C) 2015 Martin Kolb
//
// Based on:
// -------------------------------------------------------------------
// markItUp!
// -------------------------------------------------------------------
// Copyright (C) 2008 Jay Salvat
// http://markitup.jaysalvat.com/
// -------------------------------------------------------------------
// MarkDown tags example
// http://en.wikipedia.org/wiki/Markdown
// http://daringfireball.net/projects/markdown/
// -------------------------------------------------------------------
// Feel free to add more tags
// -------------------------------------------------------------------

var myMarkdownSettings = {
	previewParserPath:	'',
	onShiftEnter: {keepDefault: false, openWith: '\n\n'},
	onTab: {keepDefault: false, replaceWith: '\t'},
	markupSet: [
		{name: 'First Level Heading', key: '1', openWith: '# ', placeHolder: 'Your title here...', className: 'h1Button' },
		{name: 'Second Level Heading', key: '2', openWith: '## ', placeHolder: 'Your title here...' , className: 'h2Button' },
		{name: 'Heading 3', key: '3', openWith: '### ', placeHolder: 'Your title here...' , className: 'h3Button' },
		{name: 'Heading 4', key: '4', openWith: '#### ', placeHolder: 'Your title here...' , className: 'h4Button' },
		{name: 'Heading 5', key: '5', openWith: '##### ', placeHolder: 'Your title here...' , className: 'h5Button' },
		{name: 'Heading 6', key: '6', openWith: '###### ', placeHolder: 'Your title here...' , className: 'h6Button' },
		{separator: '---------------' },
		{name: 'Bold', key: 'B', openWith: '**', closeWith: '**', className: 'boldButton' },
		{name: 'Italic', key: 'I', openWith: '_', closeWith: '_', className: 'italicButton' },
		{separator: '---------------' },
		{name: 'Bulleted List', openWith: '- ' , className: 'bulletListButton' },
		{name: 'Numeric List', openWith: function (markItUp) {
			"use strict";
			return markItUp.line + '. ';
		}, className: 'numericListButton' },
		{separator: '---------------' },
		{name: 'Picture', key: 'P', replaceWith: '![[![Alternative text]!]]([![Url:!:http://]!])', className: 'pictureButton' },
		{name: 'Link', key: 'L', openWith: '[', closeWith: ']([![Url:!:http://]!])', placeHolder: 'Your text to link here...' , className: 'linkButton' },
		{separator: '---------------'},
		{name: 'RedaxoLink',
			beforeInsert: function () {
				"use strict";
				openLinkMap('TINY', '&clang=0');
				return false;
			}, className: 'redaxoLinkButton' },
		{name: 'RedaxoMedia',
			beforeInsert: function () {
				"use strict";
				openMediaPool('TINYIMG');
				return false;
			}, className: 'redaxoMediaButton' },
		{separator: '---------------'},
		// {name: 'Quotes', openWith: '> '}, # disable quotes for now, as they do not work
		{name: 'Code Block / Code', openWith: '(!(\t|!|`)!)', closeWith: '(!(`)!)', className: 'codeBlockButton' },
		{name: 'Table', openWith: '|thead1 | thead2 | thead3 | thead4 |\n|-------|--------|--------|--------|\n|cell1  |cell2   |cell3   |cell4   |\n|cell1  |cell2   |cell3   |cell4   |' , className: 'tableButton' },
		{separator: '---------------'}
		// {name: 'Preview', call: 'preview', className:"preview"}
	]
};

var insertLink = function (url, desc) {
		"use strict";
    jQuery.markItUp({
        openWith: '[',
        closeWith: desc + '](' + url + ')',
        className: 'popup-linkintern'
    });
};

var insertImage = function (src, desc) {
		"use strict";
    jQuery.markItUp({
			openWith: '![',
			closeWith: desc + '](' + src + ')'
    });
}


// mIu nameSpace to avoid conflict.
var miu = {
	markdownTitle: function (markItUp, char) {
		"use strict";
		var heading = '', n, i;
		n = jQuery.trim(markItUp.selection || markItUp.placeHolder).length;
		for (i = 0; i < n; i + 1) {
			heading += char;
		}
		return '\n' + heading;
	}
};
