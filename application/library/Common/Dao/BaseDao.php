<?php
namespace Common\Dao;

use Common\Dao\BaseDaoInterface;

class BaseDao extends Connection {

	private $connection;

	public function __construct(){
		if (empty($connection)){
			$this->connection = \Yaf_Registry::get('connection');
		}
	}

	public function insert(array $data){
		$sql = 'INSERT INTO ' . $this->getTable();
		$fiedls = array();
		foreach ($data as $key => $value) {
			# code...
		}
		$fiedls = array_keys($data);

	}

}