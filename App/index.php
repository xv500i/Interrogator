<?php
 
// Front controller
 
// carga e inicia algunas librerías globales
// require_once 'model.php';
require_once 'controllers.php';
 
// Dispatching
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/') {
	home_action();
} elseif ($uri == '/index.php/create') {
    create_question_action();
} elseif ($uri == '/index.php/create' && false) {
    show_action($_GET['id']);
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}

?>