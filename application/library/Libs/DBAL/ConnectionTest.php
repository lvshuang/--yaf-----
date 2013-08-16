<?php
namespace Src\DBAL;

use Test\BaseTest;
use Src\DBAL\ConnectionTestData;
use Src\DBAL\Connection;

define('APP_PATH', substr(dirname(__FILE__), 0, strlen(dirname(__FILE__)) - 29));


class ConnectionTest extends \PHPUnit_Framework_TestCase {

	protected $connection;

	public function setUp(){
		$this->init();
		$this->initTable();
	}

	public function init(){
		$config = new \Yaf_Config_Ini(APP_PATH . '/conf/application.ini', 'test');
		$type     = $config->get('database')->type;
		$host     = $config->get('database')->host;
		$port     = $config->get('database')->port;
		$username = $config->get('database')->username;
		$password = $config->get('database')->password;
		$databaseName = $config->get('database')->databaseName;
		$dsn = $type . ':' . 'dbname=' . $databaseName . ';host=' . $host;
		$this->connection = new Connection($dsn, $username, $password);
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