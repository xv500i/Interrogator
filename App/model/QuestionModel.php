<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/model/DBModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/QuestionDAO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/model/AnswerDAO.php');

class QuestionModel extends DBModel {

	private static $select_all_questions = 'select q.id as id, q.description as description, q.created as created, q.modified as modified, q.begin_date as initial_date, q.end_date as ending_date, a.name as answer_name, a.votes as answer_votes, a.description as answer_description from questions q, answers a where q.id = a.question_id;';
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getDefaultQuestion() {
		$answers = array(
			new AnswerDAO('A', 'answer description for A', null, null),
			new AnswerDAO('B', 'answer description for B', null, null),
			new AnswerDAO('C', 'answer description for C', null, null)
		);
		
		$question = new QuestionDAO(null, 'Description for the question', null, '19/05/2014', '20/05/2014', array(), null);
		
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
		return null;
	}
	
	public function update($entity) {}
	
	public function delete($id) {}
	
	public function getAll() {
		try {
			$questions = $this->db_handler->select(self::$select_all_questions);
			//var_dump($this);
			//var_dump($questions);
			$objs = array();
			
			foreach($questions as $question) {
				if (!isset($objs[ $question['id'] ])) {
					// new question
					$objs[ $question['id'] ] = array(
						'id' => $question['id'],
						'description' => $question['description'],
						'created' => $question['created'],
						'initial_date' => $question['initial_date'],
						'ending_date' => $question['ending_date'],
						'modified' => $question['modified'],
						'answers' => array()
					);
				}
				
				// new answer
				$objs[ $question['id'] ]['answers'][] = array(
					'name' => $question['answer_name'],
					'description' => $question['answer_description'],
					'votes' => $question['answer_votes']
				);
			}
			
			//var_dump($objs);
			
			$ret = array();
			foreach($objs as $question) {
				$ret[] = $this->createQuestionFromAssoc($question);
			}
		} catch (Exception $ex) {
		
		}
		return $ret;
	}
	
	private function createQuestionFromAssoc($array) {
		
		$answers = array();
		
		foreach ($array['answers'] as $key => $value) {
			$answers[] = new AnswerDAO($value['name'], $value['description'], $value['votes'], null);
		}
		
		$question = new QuestionDAO($array['id'], $array['description'], $array['created'], $array['initial_date'], $array['ending_date'], $answers, $array['modified']);
		
		foreach ($answers as $answer) {
			$answer->question = $question;
		}
		//var_dump($question);
		return $question;
	}
}

?>