<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/DBModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/QuestionDAO.php');

class AnswerDAO {

	public $name;
	public $description;
	public $votes;
	public $question;
	
	public function __construct($n, $d, $v, $q) {
		$this->name = $n;
		$this->description = $d;
		$this->votes = $v;
		$this->question = $q;
	}
}

?>