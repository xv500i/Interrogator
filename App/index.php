<?php
 
// carga e inicia algunas librerías globales
require_once 'model.php';
require_once 'controllers.php';
 
// encamina la petición internamente
$uri = $_SERVER['REQUEST_URI'];
if ($uri == '/index.php') {
    list_action();
} elseif ($uri == '/index.php/show' && isset($_GET['id'])) {
    show_action($_GET['id']);
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}

?>