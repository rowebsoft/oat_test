<?php
namespace OAT\UserContext\Action;

use Interop\Container\Exception\ContainerException;
use OAT\UserContext\Service\Filter;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use OAT\UserContext\Service\UserList;
use OAT\UserContext\Collection\UserCollection;

class GetUsersList
{

    /**
     * @var UserList
     */
    private $user;

    /**
     * @var Filter
     */
    private $filter;

    /**
     * @param Container $container
     *
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->user = $container->get(UserList::class);
        $this->filter = $container->get(Filter::class);
    }


    public function __invoke(Request $request, Response $response, array $args = [])
    {
        $filters = $this->filter->extractFilters($request->getQueryParams());
        $users = $this->getUsers($filters);
        if (!empty($users)) {
            $usersData = UserCollection::create($users);
            return $response->withJson($usersData->toArray());
        }

        return $response->withJson('Invalid request!');
    }

    /**
     * @param array $filters
     * @return array
     */
    private function getUsers(array $filters)
    {
        return $this->user->findbyFilters($filters);
    }
}