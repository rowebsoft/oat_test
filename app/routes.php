<?php

return [
    'index' => [
        'pattern' => '/',
        'action' => function ($request, $response, $args) {
            return $response->withJson(['status' => 'OK']);
        }
    ],

    'userList' => [
        'method' => 'GET',
        'pattern' => '/users',
        'action' => OAT\UserContext\Action\GetUsersList::class
    ],

    'user' => [
        'method' => 'GET',
        'pattern' => '/user/{id}',
        'action' => OAT\UserContext\Action\GetUser::class
    ],
];