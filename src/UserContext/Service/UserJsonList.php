<?php

namespace OAT\UserContext\Service;

use OAT\UserContext\Entity\User;

class UserJsonList implements UserList
{

    private $file = '/resource/testtakers.json';

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
        // TODO: Implement findbyFilters() method.
    }

    /**
     * @return array
     */
    private function getData()
    {
        $file = __DIR__ . '../../../../' . $this->file;
        $fileData = file_get_contents($file);
        if ($fileData) {
            return json_decode($fileData, true);
        }

        return [];
    }
}