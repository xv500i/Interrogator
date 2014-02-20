<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DBHandler.php');

class DBModel extends Model {

	protected $db_handler;
	
	public function __construct() {
		$this->db_handler = new DBHandler();
	}
	
	public function get($id){}
	public function update($entity){}
	public function delete($id){}
	public function getAll(){}
}

?>