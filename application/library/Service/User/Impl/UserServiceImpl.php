<?php

namespace Service\User\Impl;

use Common\Service\BaseService;

class UserServiceImpl extends BaseService {

	protected $userDao ;

	public function login(){

	}

	public function reg(array $user){
		$user['createdTime'] = time();
		return $this->getUserDao()->addUser($user);
	}

	private function getUserDao(){
		return new \Service\User\Dao\Impl\UserDaoImpl();
	}
}