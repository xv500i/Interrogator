<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/DBModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/AnswerDAO.php');

class QuestionDAO {

	public $id;
	public $description;
	public $created;
	public $initial_date;
	public $ending_date;
	public $answers;
	
	public function __construct($i, $d, $c, $id, $ed, $a) {
		$this->id = $i;
		$this->description = $d;
		$this->created = $c;
		$this->initial_date = $id;
		$this->ending_date = $ed;
		$this->answers = $a;
	}
}

?>