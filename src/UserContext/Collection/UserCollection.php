<?php
namespace OAT\UserContext\Collection;

use OAT\UserContext\Entity\User;
use Slim\Collection;

/**
 * Class UserCollection
 * @package OAT\UserContext\Action
 */
class UserCollection extends Collection
{
    public static function create(array $userList)
    {
        $collection = new self();
        foreach ($userList as $user) {
            $collection->set($user[User::LOGIN], User::create($user));
        }

        return $collection;
    }

    public function toArray()
    {
        $users = [];
        /** @var User $user */
        foreach ($this->data as $user) {
            $users[] = $user->toArray();
        }

        return $users;
    }
}