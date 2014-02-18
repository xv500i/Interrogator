<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class CreateQuestionView extends View {
 
    public function output() {

		$question = $this->model->getDefaultQuestion();
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/create.php');

	}
}
?>