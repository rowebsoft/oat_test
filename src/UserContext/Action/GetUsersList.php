<?php

namespace OAT\UserContext\Action;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container;
use Slim\Http\Response;


class GetUsers extends AbstractAction
{

    const FILTER_NAME = 'name';
    const OFFSET = 'offset';
    const LIMIT = 'limit';


    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = [])
    {

        $filters = $this->extractFilters($args);

        $users = $this->getUsers($filters);

        /** @var Response $response */
        return $response->withJson($users);
    }

    /**
     * @param array $args
     * @return array
     */
    private function extractFilters(array $args)
    {
        $filters = [];
        if (!empty($params[self::LIMIT])) {
            $filters[self::LIMIT] = $params[self::LIMIT];
        }

        if (!empty($params[self::OFFSET])) {
            $filters[self::OFFSET] = $params[self::OFFSET];
        }

        if (!empty($params[self::FILTER_NAME])) {
            $filters[self::FILTER_NAME] = $params[self::FILTER_NAME];
        }

        return $filters;
    }

    /**
     * @param array $filters
     */
    private function getUsers(array $filters)
    {

    }
}