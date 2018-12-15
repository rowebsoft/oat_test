<?php
namespace OAT\UserContext\Repository;

class UserCSVList implements UserList
{
    private $file = './resource/testtakers.csv';

    /**
     * @return array
     */
    public function getData()
    {
        $file = __DIR__ . '../../../../' . $this->file;
        $rows = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $data = [];
        foreach ($rows as $row) {
            $data[] = array_combine($header, $row);
        }

        return $data;
    }
}