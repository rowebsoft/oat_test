<?php
namespace OAT\UserContext\Service;


class Filter
{


    const FILTER_NAME = 'name';
    const OFFSET = 'offset';
    const LIMIT = 'limit';

    const DEFAULT_OFFSET = 0;
    const DEFAULT_LIMIT = null;


    /**
     * @param array $params
     * @return array
     */
    public function extractFilters(array $params)
    {
        $filters = [];
        if (!empty($params[self::LIMIT])) {
            $filters[self::LIMIT] = (int)$params[self::LIMIT];
        }

        if (!empty($params[self::OFFSET])) {
            $filters[self::OFFSET] = (int)$params[self::OFFSET];
        }

        if (!empty($params[self::FILTER_NAME])) {
            $filters[self::FILTER_NAME] = (string)filter_var($params[self::FILTER_NAME], FILTER_SANITIZE_STRING);
        }

        return $filters;
    }

}