<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/DBModel.php');

class QuestionDAO {

	public $id;
	public $description;
	public $initial_date;
	public $ending_date;
	
	public function __construct($i, $d, $id, $ed) {
		$this->id = $i;
		$this->description = $d;
		$this->initial_date = $id;
		$this->ending_date = $ed;
	}
}

?>