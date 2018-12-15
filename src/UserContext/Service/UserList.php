<?php
namespace OAT\UserContext\Service;


interface UserList
{
    /**
     * @param string $id
     * @return array
     */
    public function findbyId($id);

    /**
     * @param array $filters
     * @return array
     */
    public function findbyFilters(array $filters);

}