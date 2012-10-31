<?php

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
use Src\DBAL\Connection;
class Bootstrap extends Yaf_Bootstrap_Abstract{

	//注册config文件
	public function _initConfig() {
		$config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set("config", $config);
	}

	public function _initBd() {
		$config = Yaf_Registry::get("config");
		$type     = $config->get('database')->type;
		$host     = $config->get('database')->host;
		$port     = $config->get('database')->port;
		$username = $config->get('database')->username;
		$password = $config->get('database')->password;
		$databaseName = $config->get('database')->databaseName;

		$dsn = $type . ':' . 'dbname=' . $databaseName . ';host=' . $host;
		Yaf_Registry::set('connection', new Connection($dsn, $username, $password));
	}

}