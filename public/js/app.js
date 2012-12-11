seajs.config({
    alias: {
        'jquery': 'jquery/1.7.2/jquery-debug',
        'kindeditor': 'kindeditor/4.1.3/kindeditor-debug'
    }
});

define(function(require, exports, module) {
	var $ = require('jquery');
    window.$ = $;

    var __seajs_assets_version = Math.random();
	exports.context = {};
    exports.load = function(name, options) {
        require.async('./modules/' + name + '.js?' + __seajs_assets_version , function(page) {
            if (page.bootstrap) {
                page.bootstrap(exports.context, options);
            }
        });
    };

	exports.bootstrap = function() {
		//This is script whick run gloable;
	};

});