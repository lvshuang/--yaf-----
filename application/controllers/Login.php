<?php
class LoginController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = $this->getRequest();
		if ($request->getMethod() === 'POST' ) {
			if ($user = $this->getUserService()->login($username, $password)) {
				return $this->redirect("/index");
			}
			$errorMsg = "登录失败！";
		}

		$this->display('index', array('name' => '登录 - ', 'errorMsg' => $errorMsg));
	}

	public function logoutAction(){

	}

}