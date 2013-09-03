<?php
class LoginController extends Common_ControllerBase
{
	
	public function indexAction(){
		$request = $this->getRequest();
		if ($request->getMethod() === 'POST' ) {
			$_token = htmlspecialchars($this->getPost('_token'));
			if ($_token !== $this->getSession()->get('_token')) {
				$errorMsg = '非法表单';
				$this->getSession()->set('_token', md5(microtime()));
				return $this->display('index', array(
					'title' => '用户登陆', 
					'errorMsg' => empty($errorMsg) ? null : $errorMsg,
				));
			}

			$username = htmlspecialchars($this->getPost('username'));
			$password = htmlspecialchars($this->getPost('password'));
			if ($user = $this->getService('User.UserService')->login($username, $password)) {
				return $this->redirect("/index");
			}
			$errorMsg = "用户名或密码错误！";
		}
		$this->getSession()->set('_token', md5(microtime()));
		return $this->display('index', array(
			'title' => '用户登陆', 
			'errorMsg' => empty($errorMsg) ? null : $errorMsg,
			'nav' => null
		));
	}

	public function logoutAction(){
		$this->getSession()->del('user');
		return $this->redirect("/index");
	}

}