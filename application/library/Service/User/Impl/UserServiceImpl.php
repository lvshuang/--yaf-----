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

	public function regUser(array $user){
		if ($this->getUserByUsername($user['username']) || $this->getUserByEmail($user['email'])) {
			return false;
		}
		$user['password'] = sha1($user['password']);
		$user['createdTime'] = time();
		return $this->getUserDao()->addUser($user);
	}

	public function getUser($id){
		return $this->getUserDao()->findUser($id);
	}

	public function getUserByUsername($username)
	{
		return $this->getUserDao()->findUserByName($username);
	}

	public function getUserByEmail($email)
	{
		return $this->getUserDao()->findUserByEmail($email);
	}

	private function getUserDao(){
		return new \Service\User\Dao\Impl\UserDaoImpl();
	}
}