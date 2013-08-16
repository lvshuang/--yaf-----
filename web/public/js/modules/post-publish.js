define(function(require, exports, module){

	var editer = require('../utils/kindeditor-helper');

	var onReady = function() {
		editer.createMiniEditor($('#content'));
	};

	exports.bootstrap = function (context, options){
		onReady();
	};

});