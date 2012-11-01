<?php
namespace Src\DBAL;

use Src\DBAL\ConnectionTestData;

define('APP_PATH', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 29));
$app = new \Yaf_Application(APP_PATH . '/conf/application.ini', 'test');
$app->bootstrap();

class ConnectionTest extends \PHPUnit_Framework_TestCase {

	protected $connection;

	public function setUp(){
		$this->init();
		$this->connection = \Yaf_Registry::get('connection');
		$this->initTable();
	}

	public function initTable() {
		$sql = ConnectionTestData::createTableSql();
		if ($this->connection->execute($sql)) {
			print("Create Connection Test Table Fail!\n");
			exit();
		}
	}

	public function testFindPost() {
		// $this->assertEmpty(0);
	}

	public function clear() {

	}

}