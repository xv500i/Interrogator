<?php

	// Include ONLY controller
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/Controller.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/Model.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/View.php');
	
	// Static routing
	$uri = $_SERVER['REQUEST_URI'];
	
	$routing_table = array(
		'/' => array(
			'model' => 'QuestionModel',
			'view' => 'HomeView',
			'controller' => 'QuestionController'
		),
		'/index.php/create' => array(
			'model' => 'QuestionModel',
			'view' => 'CreateQuestionView',
			'controller' => 'QuestionController'
		)
	);
	
	// Loop routes in order to find the components
	foreach($routing_table as $key => $components){
        if ($uri == $key) {
            $model = $components['model'];
            $view = $components['view'];
            $controller = $components['controller'];
            break;
        }
    }
 
	// If the route is specyfied retrieve the MVC
    if (isset($model)) {
	
		// Static loading
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . $model . '.php');
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . $controller . '.php');
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/' . $view . '.php');
        
		$m = new $model();
        $c = new $controller($m);
        $v = new $view($m, $c);
		
		// If controller action is defined, execute it
		if (isset($_GET['action']) && !empty($_GET['action'])) {
			$c->{$_GET['action']}();
		}
		
        $v->output();
		
    } else {
		// Fixme: use not found view
		header('Status: 404 Not Found');
		echo "<html><body><h1>Page Not Found: $uri</h1></body></html>";
	}
?>