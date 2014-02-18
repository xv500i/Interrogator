<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class QuestionSubmitView extends View {
 
    public function output() {

		$question = $this->controller->getCurrentQuestion();
		if ($this->controller->questionCreated()) {
			require ($_SERVER['DOCUMENT_ROOT'] . '/templates/create_succeed.php');
		} else {
			require ($_SERVER['DOCUMENT_ROOT'] . '/templates/create.php');
		}
	}
}
?>