<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class CreateQuestionView extends View {
 
    public function output() {
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/create.php');
	}
}
?>