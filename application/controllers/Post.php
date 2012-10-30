<?php

class PostController extends Common_Controller_Base {
	//关闭自动渲染
	public function init() {
		Yaf_Dispatcher::getInstance()->disableView();
	}

	public function indexAction() {
		$service = $this->getUserService();
		Yaf_Registry::get('dbHandle');
		$this->initView();

		// $this->display('index');
	}

	
}