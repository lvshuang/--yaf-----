<?php
use Service\User\Impl\UserServiceImpl;

class Common_Controller_Base extends Yaf_Controller_Abstract {
	//关闭自动渲染
	public function init() {
		Yaf_Dispatcher::getInstance()->disableView();
	}

	protected function getUserService(){
		return new UserServiceImpl;
	}

	protected function getPostService(){

	}

}