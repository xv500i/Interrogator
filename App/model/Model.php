<?php

abstract class Model {
	
	public function __construct() {
		$this->initialize();
	}

	public abstract function initialize();
	public abstract function get($id);
	public abstract function update($entity);
	public abstract function delete($id);
	public abstract function getAll();
}

?>

<?php
/*
function open_database_connection() {
    $link = mysql_connect('localhost', 'myuser', 'mypassword');
    mysql_select_db('blog_db', $link);
 
    return $link;
}
 
function close_database_connection($link) {
    mysql_close($link);
}

function getVotes($question_name) {
	$link = open_database_connection();
	$question_name_escaped = mysql_real_escape_string($question_name);

    $result = mysql_query('SELECT a.name, COUNT(*) AS amount_votes FROM questions q, answers a, votes v WHERE q.id = a.question_id AND v.question_id = q.id AND q.name = ' . $question_name_escaped . ' GROUP BY a.id ORDER BY a.id DESC;', $link);
    $answers = array();
    while ($row = mysql_fetch_assoc($result)) {
        $answers[] = $row;
    }
    close_database_connection($link);
 
    return $answers;
}
 
function get_all_posts() {
    $link = open_database_connection();
 
    $result = mysql_query('SELECT id, title FROM post', $link);
    $posts = array();
    while ($row = mysql_fetch_assoc($result)) {
        $posts[] = $row;
    }
    close_database_connection($link);
 
    return $posts;
}


function get_post_by_id($id) {
    $link = open_database_connection();
 
    $id = mysql_real_escape_string($id);
    $query = 'SELECT date, title, body FROM post WHERE id = '.$id;
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
 
    close_database_connection($link);
 
    return $row;
}
*/
?>