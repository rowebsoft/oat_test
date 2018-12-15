<?php

return [
    'index' => [
        'pattern' => '/',
        'action' => function ($request, $response, $args) {
            return $response->withJson(['status' => 'OK']);
        }
    ],

    'users' => [
        'method' => 'GET',
        'pattern' => '/users',
        'action' => function ($request, $response, array $args) {

            $params = $request->getQueryParams();

            $text = '';

            $response->getBody()->write("Users query: " . $text);

            return $response->withJson(['status' => 'OK', $params, 'Users query:' => $text]);
        }
    ],

    'user' => [
        'method' => 'GET',
        'pattern' => '/user/{id}',
        'action' => OAT\UserContext\Action\GetUser::class
    ],
];