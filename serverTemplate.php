<?php

// Obtém o método da requisição e a URL
$method = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

// Trata a URL para remover parâmetros desnecessários
$url = parse_url($request, PHP_URL_PATH);

// Define as rotas e suas ações correspondentes
$routes = [
    'GET' => [
        '/api/users' => 'getUsers',
        '/api/user/{id}' => 'getUserById'
    ],
    'POST' => [
        '/api/user' => 'createUser'
    ],
    'PUT' => [
        '/api/user/{id}' => 'updateUser'
    ],
    'DELETE' => [
        '/api/user/{id}' => 'deleteUser'
    ]
];

// Verifica se a rota existe e chama a função correspondente
if (isset($routes[$method][$url])) {
    $action = $routes[$method][$url];
    call_user_func($action);
} else {
    // Rota não encontrada
    http_response_code(404);
    echo json_encode(['error' => 'Rota não encontrada']);
}

// Funções de exemplo para cada rota
function getUsers()
{
    // Lógica para obter a lista de usuários
   try {
       $users = ['Alice', 'Bob', 'Charlie'];
      //  throw new Exception("Error Processing Request", 1); 
       echo json_encode($users);
   } catch(Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage(), "message" => "erro ao capturar usuarios", "code" => $e->getCode()]);
   }
}

function getUserById()
{
    // Lógica para obter um usuário por ID
    $id = $_GET['id'];
    $user = ['id' => $id, 'name' => 'Alice'];
    echo json_encode($user);
}

function createUser()
{
    // Lógica para criar um novo usuário
    // Acesso aos dados enviados pelo cliente através de $_POST
    // ...
}

function updateUser()
{
    // Lógica para atualizar um usuário existente
    // Acesso aos dados enviados pelo cliente através de $_POST
    // ...
}

function deleteUser()
{
    // Lógica para excluir um usuário
    // ...
}
