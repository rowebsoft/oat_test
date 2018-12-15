<?php
namespace OAT\UserContext\Service;


class Filter
{


    const FILTER_NAME = 'name';
    const OFFSET = 'offset';
    const LIMIT = 'limit';

    const DEFAULT_OFFSET = 0;
    const DEFAULT_LIMIT = null;


    public function extractFilters(array $params)
    {
        $filters = [];
        if (!empty($params[self::LIMIT])) {
            $filters[self::LIMIT] = $params[self::LIMIT];
        }

        if (!empty($params[self::OFFSET])) {
            $filters[self::OFFSET] = $params[self::OFFSET];
        }

        if (!empty($params[self::FILTER_NAME])) {
            $filters[self::FILTER_NAME] = $params[self::FILTER_NAME];
        }

        return $filters;
    }

}