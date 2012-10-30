<?php

namespace Service\User\Impl;

use Common\Service\BaseService;

class UserServiceImpl extends BaseService {

	protected $userDao ;

	public function __construct(){
		$db = \Yaf_Registry::get('dbHandle');
	}

	public function login(){

	}

	public function reg(){

	}
}