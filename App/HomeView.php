<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/View.php');

class HomeView extends View {
 
    public function output() {
		$questions =  $this->model->getAll();
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/home.php');
	}
}
?>