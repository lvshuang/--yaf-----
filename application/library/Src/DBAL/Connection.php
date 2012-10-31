<?php
namespace Src\DBAL;

class Connection {

	private $connection;

	public function __construce($dsn, $username, $password){

		if (!$this->connection) {
			$this->connection = new PDO($dsn, $username, $password);
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

		return $this->executeUpdate($query, $values);
	}

	public function fetchAll($table, $where, $params, $fields = null, $orderBy = null, $start = 0, $limit = null) {
		$sql = 'SELECT ';
        $sql .= empty($fields) ? '*' : '`' . join('`,`', $fields) . '`';
        $sql .= " FROM {$table} ";
        $sql .= empty($where) ? '' : " WHERE {$where} ";
        $sql .= empty($orderBy) ? '' : " ORDER BY {$orderBy}";
        $sql .= empty($limit) ? '' : " LIMIT {$start}, {$limit}";

		$statement = $this->execute($sql, $params);
		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public function fetchRow($table, $where, $params, $fields = null){
		$sql = 'SELECT ';
		$sql .= empty($fields) ? '*' : '`' . join('`,`' $fields) . '`';
		$sql .= " FROM {$table} ";
		$sql .= empty($where) ? '' : "WHERE {$where} limit 1";

		$statement = $this->execute($sql, $params);
		return $statement->fetch(PDO::FETCH_ASSOC);
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

	public function deleteAll($table, $where, $params){
		$sql = 'DELETE * FORM ' . $table . ' ' . $where;
		return $this->executeUpdate($sql, $params);
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

	private function getTable()	{
		return $this->table;
	}

}