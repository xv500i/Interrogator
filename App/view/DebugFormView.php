<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');

class DebugFormView extends View {
 
    public function output() {
		require ($_SERVER['DOCUMENT_ROOT'] . '/templates/debug_form.php');
	}
}
?>