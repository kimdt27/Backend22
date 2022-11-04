<?php
spl_autoload_register(function ($class)
{include("".$class.".php");});

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller = $controller->{$_GET['action']}();
}
echo $view->output();