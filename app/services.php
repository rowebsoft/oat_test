<?php

use OAT\UserContext\Service\Filter;
use Slim\Container;
use OAT\UserContext\Service\UserList;
use OAT\UserContext\Repository\UserCSVList;
use OAT\UserContext\Repository\UserJsonList;

return [
    UserList::class => function (Container $container) {
        return new UserList(new UserJsonList());
    },
    Filter::class => function (Container $container) {
        return new Filter();
    },
];
