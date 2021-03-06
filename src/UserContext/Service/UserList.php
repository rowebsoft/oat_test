<?php

namespace OAT\UserContext\Service;

use OAT\UserContext\Entity\User;
use OAT\UserContext\Repository\UserList as UserListInterface;

class UserList
{

    /**
     * @var UserList
     */
    private $repository;

    /**
     * UserList constructor.
     * @param UserListInterface $repository
     */
    public function __construct(UserListInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param string $id
     * @return array
     */
    public function findbyId($id)
    {
        $data = $this->getData();
        $arrayColumnData = array_column($data, User::LOGIN);
        $hasResults = array_search($id, $arrayColumnData, true);

        if ($hasResults) {
            return $data[$hasResults];
        }

        return [];
    }

    /**
     * @param array $filters
     * @return array
     */
    public function findbyFilters(array $filters)
    {
        $data = $this->getData();
        if (empty($filters)) {
            return $data;
        } elseif (!empty($filters[Filter::FILTER_NAME])) {
            $data = $this->filterDataByName($data, $filters[Filter::FILTER_NAME]);
        }

        $offset = !empty($filters[Filter::OFFSET]) ? (int)$filters[Filter::OFFSET] : Filter::DEFAULT_OFFSET;
        $limit = !empty($filters[Filter::LIMIT]) ? (int)$filters[Filter::LIMIT] : Filter::DEFAULT_LIMIT;
        $data = array_slice($data, $offset, $limit, true);

        return $data;
    }

    /**
     * @return array
     */
    private function getData()
    {
        return $this->repository->getData();
    }

    /**
     * @param array $data
     * @param string $name
     * @return array
     */
    private function filterDataByName(array $data, $name)
    {
        $filteredData = [];
        foreach ($data as $user) {
            if ($user[User::FIRSTNAME] == $name || $user[User::LASTNAME] == $name) {
                $filteredData[] = $user;
            }
        }

        return $filteredData;
    }
}