/**
 * @license Copyright (c) 2003-2023, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	// config.filebrowserBrowseUrl = 'plugins/ckfinder/ckfinder.html';
	config.filebrowserBrowseUrl = 'plugin/CKEditor/ckfinder/ckfinder.html';
	config.filebrowserUploadUrl = 'plugin/CKEditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
};