<?php
class UserController extends Common_Controller_Base
{
	
	public function regAction(){
		$request = $this->getRequest();
		if ($request->getMethod() === 'POST' ) {
			$_token = htmlspecialchars($this->getPost('_token'));
			if ($_token !== $this->getSession()->get('_token')) {
				$errorMsg = '非法表单';
				$this->getSession()->set('_token', md5(microtime()));
				return $this->display('index', array(
					'title' => '注册新用户', 
					'errorMsg' => empty($errorMsg) ? null : $errorMsg,
					'nav' => null
				));
			}

			$username = htmlspecialchars($this->getPost('username'));
			$password = htmlspecialchars($this->getPost('password'));
			if ($user = $this->getUserService()->login($username, $password)) {
				return $this->redirect("/index");
			}
			$errorMsg = "用户名或密码错误！";
		}
		$this->getSession()->set('_token', md5(microtime()));
		return $this->display('reg', array(
			'title' => '注册新用户', 
			'errorMsg' => empty($errorMsg) ? null : $errorMsg,
			'nav' => null
		));
	}

}