<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/Model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/DBHandler.php');

abstract class DBModel extends Model {

	protected $db_handler;
	
	public function initialize() {
		$db_handler = new DBHandler();
	}
}

?>