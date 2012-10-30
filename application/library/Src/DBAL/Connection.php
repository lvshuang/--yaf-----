<?php
namespace Src\DBAL;

class Connection {

	private $connection;

	public function __construce($host, $username, $password, $dbname, $type = 'mysql' $port = 3306){

		if (!$this->connection) {
			$dsn = $type . ':dbname=' . $dbname. ';host=' . $host;
			$this->connection = new PDO($dsn, $username, $password);
		}
	}


	public function prepareSql($sql) {
		return $this->connection->prepare($sql);
	}

	public function execute($sql, array $params) {
		$statement = $this->prepareSql($sql);
		$index = 1;
		foreach ($params as $key => $value) {
			$statement->bindValue($index, $value);
			$index ++;
		}
		$statement->execute();
		return $statement;
	}

	public function executeUpdate($sql, array $params = array()) {
		if (empty($params)) {
			return $this->connection->exec($sql);
		}
		$statement = $this->prepareSql($sql);
		$index = 1;
		foreach ($params as $key => $value) {
			$statement->bindValue($index, $value);
			$index ++;
		}
		$statement->execute();
		return $statement->rowCount();
	}

	public function lastInsertId() {
		return $this->connection->lastInsertId();
	}

}