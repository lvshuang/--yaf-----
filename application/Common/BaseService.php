<?php
namespace Common\Service;

abstract class BaseService {
	
	protected function AccessExpection(){
		throw new \Exception("权限不足！");
	}

	protected function getSession() {
		return \Yaf_Registry::get('sesson');
	}

}