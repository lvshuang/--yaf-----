define(function(require, exports, module){

	var onReady = function(options) {
		var $form = $('login-form');

		$form.submit(function(){
			$('button[type="submit"]').val('登陆中...');
			$('button[type="submit"]').attr('disabled', 'disabled');
		});
	};


	exports.bootstrap = function(context, options){
		onReady(options);
	};

});