<?php
class LoginController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = $this->getRequest();
		if ($request->getMethod() === 'POST' ) {
			$username = htmlspecialchars($this->getPost('username'));
			$password = htmlspecialchars($this->getPost('password'));
			if ($user = $this->getUserService()->login($username, $password)) {
				return $this->redirect("/index");
			}
			$errorMsg = "用户名或密码错误！";
		}

		$this->display('index', array(
			'title' => '用户登陆', 
			'errorMsg' => empty($errorMsg) ? null : $errorMsg,
		));
	}

	public function logoutAction(){
		$this->getSession()->del('user');
		return $this->redirect("/index");
	}

}