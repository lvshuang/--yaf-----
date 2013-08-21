<?php

namespace Service\Post\Impl;

use Common\Service\BaseService;

class PostServiceImpl extends BaseService {

	public function save(array $post){
		if (empty($post['id'])) {
			return $this->addPost();
		}
		return $this->updatePost($post['id'], $post);
	}

	public function addPost(array $post){
		$user = $this->getSession()->get('user');
		$post['userId'] = $user['id'];
		$post['createdTime'] = time();
		return $this->getPostDao()->addUser($post);
	}

	public function updatePost($id, array $fields)
	{
		$post['updatedTime'] = time();
		return $this->getPostDao()->updatePost($id, $fields);
	}

	public function getUser($id){
		return $this->getPostDao()->findUser($id);
	}


	private function getPostDao(){
		return new \Service\Post\Dao\Impl\PostDaoImpl();
	}
}