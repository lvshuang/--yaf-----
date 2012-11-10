define(function(require, exports, module){

	var onReady = function(options) {
		var form = $('login-form');

		$('input[type="submit"]').click(function(){
			$(this).val('登陆中...');
			$(this).attr('disabled', 'disabled');
			return false;
		});
	};


	exports.bootstrap = function(context, options){
		onReady(options);
	};

});