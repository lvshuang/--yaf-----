<?php
class IndexController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = $this->getRequest();
		$user = $this->getUserService()->getUser(1);
		
		$this->display('index', array(
			'name' => 'YAF实例----------', 
			'user' => $user,
			'nav' => 'home_page'
		));
	}

	public function userAction(){
		$request = new Yaf_Request_Http ();
	}

}