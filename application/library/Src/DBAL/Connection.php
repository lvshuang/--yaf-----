<?php
namespace Src\DBAL;
use Common\Dao\BaseDaoInterface;

class Connection implements BaseDaoInterface {

	private $connection = null;

	public function __construct($dsn, $username, $password){
		if (empty($this->connection)) {
			$this->connection = new \PDO($dsn, $username, $password);
			$this->connection->exec('SET NAMES utf8');
		}
	}

	public function insert($table, $data) {
		$cols = array();
		$marks = array();

		foreach ($data as $field => $value) {
			$cols[] = $field;
			$marks[] = '?';
		}
		$query = 'INSERT INTO ' . $table
               . ' (' . implode(', ', $cols) . ')'
               . ' VALUES (' . implode(', ', $marks) . ')';

		return $this->executeUpdate($query, array_values($data));
	}

	public function fetchAll($sql, $params) {
		$statement = $this->execute($sql, $params);
		return $statement->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function fetchObject($sql, $params){
		$statement = $this->execute($sql, $params);
		return $statement->fetch(\PDO::FETCH_OBJ);
	}

	public function fetchAssoc($sql, $params) {
		$statement = $this->execute($sql, $params);
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}

	public function update($table, $id, $data) {
		$sql = 'UPDATE ' . $table . ' SET ';
		$fields = array();
		foreach ($data as $field => $value) {
			$fields[] = $field . '=?';
		}
		$sql .= join(',', $fields);

		return $this->executeUpdate($sql, array_values($data));
	}

	public function delete($table, $id) {
		$sql = 'DELETE * FORM ' . $table . ' WHERE id=?';
		return $this->executeUpdate($sql, $id);
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

	public function getConnection() {
		return $this->connection;
	}
}