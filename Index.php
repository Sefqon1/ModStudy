<?php

$page = $_GET['page'] ?? '/';

$routes = [
    '/' => 'HomeController@index',
    'task' => 'ParentTaskController@index',
    'edit' => 'TaskEditController@index',
    'create' => 'TaskCreationController@index'
];

if ($page !== '/') {
    $urlParts = explode('/', $page);
    $url = $urlParts[0];
    $id = $urlParts[1] ?? null;
} else {
    $url = $page;
    $id = null;
}

if (array_key_exists($url, $routes)) {
    [$controller, $method] = explode('@', $routes[$url]);
    include('./Controller/' . $controller . '.php');
    $controllerInstance = new $controller();
    if ($id) {
        $controllerInstance->$method($id);
    } else {
        $controllerInstance->$method();
    }
} else {
    echo "404 Not Found :(";
}
