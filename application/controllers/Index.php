<?php
class IndexController extends Common_Controller_Base
{
	
	public function indexAction(){
		$request = new Yaf_Request_Http ();
		$this->display('index', array('name' => 'YAF实例----------'));
	}

	public function userAction(){
		$request = new Yaf_Request_Http ();
		var_dump($request);
	}

}