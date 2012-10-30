<?php
namespace Common\Service;

abstract class BaseService {
	
	public function AccessExpection(){
		throw new \Exception("权限不足！");
	}

}