<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/controller/Controller.php');

class QuestionController extends Controller {
	
	public $currentQuestion;
	public $createSucceed;
	
	public function getCurrentQuestion() {
		return ($this->currentQuestion == null ? $this->model->getDefaultQuestion() : $this->currentQuestion);
	}
	
	public function createQuestionAction() {
		$correct_post = true;
		
		// validate post
		if (isset($_POST['question']['desc'])) {
			$d = $_POST['question']['desc'];
		} else {
			$correct_post = false;
		}
		if (isset($_POST['question']['initial_date'])) {
			$id = $_POST['question']['initial_date'];
		} else {
			$correct_post = false;
		}
		if (isset($_POST['question']['end_date'])) {
			$ed = $_POST['question']['end_date'];
		} else {
			$correct_post = false;
		}
		if (isset($_POST['answers'])) {
			$answers = array();
			foreach ($_POST['answers'] as $answer) {
				if (isset($answer['desc']) && isset($answer['name'])) {
					$answers[] = array(
						'desc' => $answer['desc'],
						'name' => $answer['name']
					);
				} else {
					$correct_post = false;
				}
			}
		} else {
			$correct_post = false;
		}
		
		if (!$correct_post) {
			// Not permited to continue
			header("bad request");
			die();
		}
		
		$question = new QuestionDAO(null, $d, null, $id, $ed, array(), null);
		
		foreach ($answers as $answer) {
			$question->answers[] = new AnswerDAO($answer['name'], $answer['desc'], null, $question);
		}
		
		// Save question for the view
		$this->currentQuestion = $question;
		//var_dump($question);
		
		$errors = $this->model->validate($question);
		if (sizeof($errors) == 0) {
			try {
				$this->model->create($question);
				$this->createSucceed = true;
			} catch (Exception $e) {
				//var_dump($e);
			}
		} else {
			$this->createSucceed = false;
		}
		//$valid = ($this->createSucceed ? 'true' : 'false');
		//echo "The model is valid = $valid";
		//var_dump($errors);
	}
	
	public function questionCreated() {
		return $this->createSucceed;
	}
}
?>