<?php
class IndexController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = new Yaf_Request_Http ();
		$user = array('username' => '测试', 'password'=>'123456');
		if ($user = $this->getUserService()->reg($user)){
			var_dump('注册成功！', $user);
		} else {
			var_dump('注册失败！');
		}
		exit;
		$this->display('index', array('name' => 'YAF实例----------'));
	}

	public function userAction(){
		$request = new Yaf_Request_Http ();
	}

}