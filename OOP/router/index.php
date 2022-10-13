<?php

include 'Router.php';

$request = $_SERVER['REQUEST_URI'];
$router = new Router($request);

$router->get('/', 'site/home');
$router->get('post', 'site/post');
echo "test";