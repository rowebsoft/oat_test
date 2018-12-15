<?php
namespace OAT\UserContext\Repository;

class UserJsonList implements UserList
{

    private $file = '/resource/testtakers.json';

    /**
     * @return array
     */
    public function getData()
    {
        $file = __DIR__ . '../../../../' . $this->file;
        $fileData = file_get_contents($file);
        if ($fileData) {
            return json_decode($fileData, true);
        }

        return [];
    }
}