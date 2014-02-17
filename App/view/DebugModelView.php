<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class DebugModelView extends View {
 
    public function output() {
		$models =  $this->model->getAll();
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/debug_model.php');
	}
}
?>