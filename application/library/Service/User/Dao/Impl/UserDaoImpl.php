<?php
namespace Service\User\Dao\Impl;

use Common\Dao\BaseDao;

class UserDaoImpl extends BaseDao{

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



}