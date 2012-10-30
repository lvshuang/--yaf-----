<?php
namespace Common\Dao;

class BaseDao {

	private $dbHandle;

	public function __construct(){
		if (empty($dbHandle)){
			$this->dbHandle = \Yaf_Registry::get('dbHandle');
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