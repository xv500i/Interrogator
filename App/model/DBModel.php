<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/Model.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/DBHandler.php');

abstract class DBModel extends Model {

	protected $db_handler;
	
	public function initialize() {
		$db_handler = new DBHandler();
	}
}

?>