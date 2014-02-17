<?php
class Controller {
    protected $model;
 
    public function __construct($model){
        $this->model = $model;
    }
}
?>

<?php

/*
function home_action() {
	require 'templates/home.php';
}

function create_question_action() {
	require 'templates/create.php';
}

function list_action()
{
    $posts = get_all_posts();
    require 'templates/list.php';
}
 
function show_action($id)
{
    $post = get_post_by_id($id);
    require 'templates/show.php';
}
*/
?>