<?php

class DBHandler {
	
	private static $DB_USER = 'root';
	private static $DB_URL = 'localhost';
	private static $DB_PASSWORD = '';
	private static $DB_NAME = 'interrogator';
	private $mysqli;
	
	public function __construct() {
		$this->mysqli = new mysqli(self::$DB_URL, self::$DB_USER, self::$DB_PASSWORD, self::$DB_NAME);
		if ($this->mysqli->connect_errno) {
			throw new Exception('Failed to connect to MySQL: (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
		}
	}
	
	public function __destruct() {
		$this->mysqli->close();
	}
	
	public function select($query) {
		$ret = array();
		$res = $this->mysqli->query($query);
		if ($this->mysqli->error) {
			throw new Exception('Query error:' . $this->mysqli->error);
		}
		$res->data_seek(0);
		while ($row = $res->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;
	}
}

?>