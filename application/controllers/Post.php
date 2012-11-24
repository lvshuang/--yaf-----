<?php

class PostController extends Common_Controller_Base {
	
	public function publishAction() {
		$this->getSession()->set('_token_post_publish', md5(microtime()));
		$this->display('publish', array(
			'name' => 'YAF实例----------', 
			'nav' => 'home_page'
		));
	}

	
}