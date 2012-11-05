<?php
class IndexController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = new Yaf_Request_Http ();
		// $user = array('username' => '测试' . time(), 'password'=>'123456');
		// if ($user = $this->getUserService()->reg($user)){
		// 	var_dump('注册成功！', $user);
		// } else {
		// 	var_dump('注册失败！');
		// }
		$user = $this->getUserService()->getUser(1);
		$this->display('index', array('name' => 'YAF实例----------', 'user' => $user));
	}

	public function userAction(){
		$request = new Yaf_Request_Http ();
	}

}