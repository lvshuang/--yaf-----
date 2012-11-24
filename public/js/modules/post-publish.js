define(function(require, exports, module){

	require('ckeditor');
	require('ckeditor.config');

	var onReady = function() {
		CKEDITOR.editorConfig  = function(config) {
			config.language = 'zh-cn';
		};
		CKEDITOR.replace( 'content' );
	};

	exports.bootstrap = function (context, options){
		onReady();
	};

});