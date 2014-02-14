<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/DBModel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/QuestionDAO.php');

class QuestionModel extends DBModel {

	public function get($id) {
		$obj = new QuestionDAO(123, 'Test description', '13/12/2013', '14/12/2013');
		return $obj;
	}
	
	public function update($entity) {}
	
	public function delete($id) {}
	
	public function getAll() {
		$objs = array();
		$objs[] = $this->get(1);
		$objs[] = $this->get(2);
		$objs[] = $this->get(3);
		return $objs;
	}
}

?>