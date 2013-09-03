<?php

class Service_User_Impl_UserServiceImpl extends Common_BaseService {


	public function login($username, $password){
		$user = $this->getDao('User.UserDao')->findUserByName($username);
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
		return $this->getDao('User.UserDao')->addUser($user);
	}

	public function getUser($id){
		return $this->getDao('User.UserDao')->findUser($id);
	}

	public function getUserByUsername($username)
	{
		return $this->getDao('User.UserDao')->findUserByName($username);
	}

	public function getUserByEmail($email)
	{
		return $this->getDao('User.UserDao')->findUserByEmail($email);
	}

}