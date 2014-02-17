<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class HomeView extends View {
 
    public function output() {
		$questions =  $this->model->getAll();
		$title = "Last added questions";
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/home.php');
	}
}
?>