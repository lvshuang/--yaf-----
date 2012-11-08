<?php

namespace Service\User\Impl;

use Common\Service\BaseService;

class UserServiceImpl extends BaseService {

	protected $userDao ;

	public function login($username, $password){
		$user = $this->getUserDao()->findUserByName($username);
		if (empty($user)) {
			return false;
		}
		if ($user['password'] === sha1($password)) {
			$this->getSession()->set('user', $user);
			return true;
		}
		return false;
	}

	public function reg(array $user){
		$user['createdTime'] = time();
		return $this->getUserDao()->addUser($user);
	}

	public function getUser($id){
		return $this->getUserDao()->findUser($id);
	}

	private function getUserDao(){
		return new \Service\User\Dao\Impl\UserDaoImpl();
	}
}