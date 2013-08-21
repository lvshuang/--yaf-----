<?php

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract{

	public function _initConfig() {
		$this->config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set("config", $this->config);
	}

	public function _initError() {
		if($this->config->application->showErrors){
            error_reporting (-1);
            ini_set('display_errors','On');
        }
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
		Yaf_Registry::set('connection', new Libs_DBAL_Connection($dsn, $username, $password));
	}

	public function _initViewParameters(Yaf_Dispatcher $dispatcher) {
        $dispatcher->initView(APP_PATH . "/application/views/")->assign("webroot", APP_PATH);
    }

	public function _initSesson() {
		$sesson = Yaf_Session::getInstance();
		Yaf_Registry::set('sesson', $sesson);
	}

}