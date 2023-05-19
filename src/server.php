<?php

require_once 'routes/userRoute.php';
require_once 'controllers/userController.php';

$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];


$url = parse_url($request,PHP_URL_PATH);

if (isset($routes[$method][$url])){
    $action = $routes[$method][$url];
   
    $controllerName = strtok($action, '@');
    $methodName = substr($action, strpos($action,'@')+ 1);

    $controller = new $controllerName();

    $controller->$methodName();
} else {
    // Rota não encontrada
    http_response_code(404);
    echo json_encode(['error' => 'Rota não encontrada']);
}