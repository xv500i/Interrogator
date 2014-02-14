<?php
abstract class View
{
    protected $model;
	protected $controller;
 
    public function __construct($model, $controller) {
        $this->controller = $controller;
        $this->model = $model;
    }
 
    public abstract function output();
}
?>