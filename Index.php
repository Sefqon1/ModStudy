<?php



$url = $_GET['page'] ?? '/';

$routes = [
    '/' => 'HomeController@index',
    'task' => 'ParentTaskController@index',
    'edit' => 'TaskEditController@index',
    'create' => 'TaskCreationController@index'
];

if (array_key_exists($url, $routes)) {
    [$controller, $method] = explode('@', $routes[$url]);
    include('./Controller/' . $controller . '.php');
    $controllerInstance = new $controller();
    $controllerInstance->$method();
} else {
    echo "404 Not Found :(";
}