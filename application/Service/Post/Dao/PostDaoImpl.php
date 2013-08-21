<?php
namespace Service\Post\Dao\Impl;

use Common\Dao\BaseDao;

class PostDaoImpl extends BaseDao 
{

	protected $table = 'post';

	public function addPost(array $post)
	{
		return $this->insert($post);
	}

	public function findPost($id)
	{
		$id = (int) $id;
		return $this->fetch($id);
	}

	public function getPostsByUserId($userId)
	{
		$userId = (int) $userId;
		return $this->fetchRow('userId=?', $userId);
	}

	public function updatePost($id, array $fields)
	{
		return $this->update($id, $fields);
	}

}