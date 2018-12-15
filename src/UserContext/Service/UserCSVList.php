<?php

namespace OAT\UserContext\Service;

use OAT\UserContext\Entity\User;

class UserCSVList implements UserList
{
    private $file = './resource/testtakers.csv';

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

    }

    private function getData()
    {
        $file = __DIR__ . '../../../../' . $this->file;
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $data = array();
        foreach ($rows as $row) {
            $data[] = array_combine($header, $row);
        }

        return $data;
    }
}