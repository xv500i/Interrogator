<?php

	// Include ONLY MVC abstract classes
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/controller/Controller.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/Model.php');
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/View.php');
	
	// Static routing
	$full_uri = $_SERVER['REQUEST_URI'];
	$url_parts = parse_url($full_uri);
	$uri = $url_parts['path'];
	// echo $uri . '<br/>';
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
		),
		'/index.php/debug_model' => array(
			'model' => 'QuestionModel',
			'view' => 'DebugModelView',
			'controller' => 'QuestionController'
		),
		'/index.php/debug_form' => array(
			'model' => 'QuestionModel',
			'view' => 'DebugFormView',
			'controller' => 'QuestionController'
		),
		'/index.php/submitQuestion' => array(
			'model' => 'QuestionModel',
			'view' => 'QuestionSubmitView',
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
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/model/' . $model . '.php');
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/controller/' . $controller . '.php');
		require_once ($_SERVER['DOCUMENT_ROOT'] . '/view/' . $view . '.php');
        
		// This instantiates the MVC depending on specifications from routing table
		$m = new $model();
        $c = new $controller($m);
        $v = new $view($m, $c);
		
		// If controller action is defined, execute it
		if (isset($_GET['action']) && !empty($_GET['action'])) {
			$c->{$_GET['action'].'Action'}();
		}
		
		// View is the responsible of output
        $v->output();
		
    } else {
	
		// Fixme: use not found view
		header('Status: 404 Not Found');
		echo "<html><body><h1>Page Not Found: $uri</h1></body></html>";
	}
?>