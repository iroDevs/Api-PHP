<?php

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


