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
				return $this->display('reg', array(
					'title' => '注册新用户', 
					'errorMsg' => empty($errorMsg) ? null : $errorMsg,
					'nav' => null
				));
			}

			$user = array();
			$user['username'] = htmlspecialchars($this->getPost('username'));
			$user['password'] = htmlspecialchars($this->getPost('password'));
			$user['repassword'] = htmlspecialchars($this->getPost('repassword'));
			$user['email'] = htmlspecialchars($this->getPost('email'));
			$user['gender'] = htmlspecialchars($this->getPost('gender'));

			list($status, $validateErrorMsges) = $this->checkUserData($user);

			if (!$status) {
				return $this->display('reg', array(
					'validateErrorMsges' => $validateErrorMsges,
					'user' => $user,
					'title' => '注册新用户',
					'nav' => null
				));
			}
			unset($user['repassword']);
			if ($user = $this->getUserService()->regUser($user)) {
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

	private function checkUserData(array $user)
	{
		$status = true;
		$errorMsg = array();
		if (!preg_match('/^[a-zA-Z0-9_\x80-\xff]{4,24}$/', $user['username'])) {
			$status = false;
			$errorMsg['username'] = '用户名不符合要求！';
		}
		if (!preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/i', $user['email'])) {
			$status = false;
			$errorMsg['email'] = '邮箱格式错误！';
		}

		if (!preg_match('/^[a-zA-Z0-9_@]{6,18}$/i', $user['password'])) {
			$status = false;
			$errorMsg['password'] = '密码格式不正确！';
		}
		if ($user['password'] != $user['repassword']) {
			$status = false;
			$errorMsg['repassword'] = '两次输入密码不相同！';
		}
		if (!in_array($user['gender'], array('male', 'fmale'))) {
			$status = false;
			$errorMsg['gender'] = '性别错误！';
		}
		if ($this->getUserService()->getUserByUsername($user['username'])) {
			$status = false;
			$errorMsg['username'] = '用户名已存在！';
		}
		if ($this->getUserService()->getUserByEmail($user['email'])) {
			$status = false;
			$errorMsg['email'] = '邮箱地址已被注册！';
		}
		return array($status, $errorMsg);
	}

}