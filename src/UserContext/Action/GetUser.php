<?php
namespace OAT\UserContext\Action;

use Interop\Container\Exception\ContainerException;
use OAT\UserContext\Entity\User;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use OAT\UserContext\Service\UserList;

class GetUser
{
    const ID = 'id';

    /**
     * @var UserList
     */
    protected $user;

    /**
     * @param Container $container
     *
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        $this->user = $container->get(UserList::class);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, array $args = [])
    {
        $user = $this->user->findbyId($args[static::ID]);
        if (!empty($user)) {
            $userData = User::create($user);
            return $response->withJson($userData->toArray());
        }

        return $response->withJson('Invalid request!');
    }

}