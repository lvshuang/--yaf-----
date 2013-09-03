<?php
/**
* Notice: If the file name end by 'Controller', Yaf well load it from the controller folder.
* So, I create a file named ControllerBase, it should be named BaseController.
*/

class IndexController extends Common_ControllerBase
{
	public function indexAction() {
		$request = $this->getRequest();
		$user = $this->getService('User.UserService');
		$this->display('index', array(
			'name' => 'YAF实例----------', 
			'nav' => 'home_page'
		));
	}

	public function userAction(){
		$request = new Yaf_Request_Http ();
	}

}