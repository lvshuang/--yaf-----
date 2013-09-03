<?php

class Service_User_Dao_Impl_UserDaoImpl extends Common_BaseDao{

	protected $table = 'user';

	public function addUser(array $user)
	{
		return $this->insert($user);
	}

	public function findUser($id)
	{
		$id = (int) $id;
		return $this->fetch($id);
	}

	public function findUserByName($username)
	{
		return $this->fetchRow('username=?', array($username));
	}

	public function findUserByEmail($email)
	{
		return $this->fetchRow('email=?', array($email));
	}

}