<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/DBModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/QuestionDAO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/AnswerDAO.php');

class QuestionModel extends DBModel {

	private static $mockQuestions;
	
	public function initialize() {
		parent::initialize();
		
		//Mock answers
		$answers = array(
			array(
				new AnswerDAO('A', 'answer description for A', 3515, null),
				new AnswerDAO('B', 'answer description for B', 2121, null),
				new AnswerDAO('C', 'answer description for C', 20351, null),
				new AnswerDAO('D', 'answer description for D', 2000, null)
			),
			array(
				new AnswerDAO('1', 'answer description for 1', 202, null),
				new AnswerDAO('2', 'answer description for 2', 909, null),
				new AnswerDAO('3', 'answer description for 3', 1002, null),
				new AnswerDAO('4', 'answer description for 4', 678, null)
			),
			array(
				new AnswerDAO('Y', 'Yes', 223, null),
				new AnswerDAO('N', 'No', 1385, null)
			),
			array(
				new AnswerDAO('A', 'answer description for A', 1, null),
				new AnswerDAO('B', 'answer description for B', 2, null),
				new AnswerDAO('C', 'answer description for C', 3, null),
				new AnswerDAO('D', 'answer description for D', 4, null)
			),
			array(
				new AnswerDAO('A', 'answer description for A', 20, null),
				new AnswerDAO('B', 'answer description for B', 30, null),
				new AnswerDAO('C', 'answer description for C', 20, null),
				new AnswerDAO('D', 'answer description for D', 200, null)
			)
		);
		
		self::$mockQuestions = array(
			new QuestionDAO(123, 'Test description0', '12/12/2013', '13/12/2013', '14/12/2013', array()),
			new QuestionDAO(124, 'Test description1', '12/12/2014', '13/12/2014', '14/12/2014', array()),
			new QuestionDAO(125, 'Test description2', '12/12/2015', '13/12/2015', '14/12/2015', array()),
			new QuestionDAO(126, 'Test description3', '12/12/2016', '13/12/2016', '14/12/2016', array()),
			new QuestionDAO(127, 'Test description4', '12/12/2017', '13/12/2017', '14/12/2017', array())
		);
		
		for ($i = 0; $i < count(self::$mockQuestions); $i++) {
			$question = self::$mockQuestions[$i];
			foreach ($answers[$i] as $answer) {
				// Bidirectional reference
				$answer->question = $question;
				$question->answers[] = $answer;
			}
		}
	}
	
	public function getDefaultQuestion() {
		$answers = array(
			new AnswerDAO('A', 'answer description for A', null, null),
			new AnswerDAO('B', 'answer description for B', null, null),
			new AnswerDAO('C', 'answer description for C', null, null)
		);
		
		$question = new QuestionDAO(null, 'Description for the question', null, '19/05/2014', '20/05/2014', array());
		
		foreach ($answers as $answer) {
			$answer->question = $question;
			$question->answers[] = $answer;
		}
		
		return $question;
	}
	
	public function validate($question) {
		$ret = array();
		
		// Check Question
		if ($question->description == '') {
			$ret['question.description']['void'] = 'Question\'s description is void';
		}
		if ($question->initial_date == '') {
			$ret['question.initial_date']['void'] = 'Initial date is void';
		}
		// Todo valid date
		if ($question->ending_date == '') {
			$ret['question.ending_date']['void'] = 'Ending date is void';
		}
		// TODO valid date
		if (sizeof($question->answers) < 2 || sizeof($question->answers) > 10) {
			$ret['question.answers']['limits'] = 'One question must have between 2 and 10 answers, both included';
		}
		
		// Check answers
		foreach ($question->answers as $key => $value) {
			if ($value->description == '') {
				$ret["question.answers$key.description"]['void'] = "Answer $key description is void";
			}
			if ($value->name == '') {
				$ret["question.answers$key.name"]['void'] = "Answer $key name is void";
			}
		}
		
		return $ret;
	}

	public function get($id) {
		/*
			string date(string $format, int $timestamp);
			format = 'j-n-Y H-i e'
			
			int time(): current time from epoch
			
			int mktime( hour, minute, second, month, day, year, is_dst);
			
			int strtotime(string);
			
			$ymd = DateTime::createFromFormat('m-d-Y', $string)->format('Y-m-d');
			
			strtotime('2013-02-20 02:25:21') should be fine
		
		*/
		return QuestionModel::$mockQuestions[$id];
	}
	
	public function update($entity) {}
	
	public function delete($id) {}
	
	public function getAll() {
		$objs = array();
		$objs[] = $this->get(0);
		$objs[] = $this->get(1);
		$objs[] = $this->get(2);
		$objs[] = $this->get(3);
		$objs[] = $this->get(4);
		return $objs;
	}
}

?>