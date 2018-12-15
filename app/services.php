<?php

use OAT\UserContext\Service\UserJsonList;
use Slim\Container;
use OAT\UserContext\Service\UserCSVList;

return [
    UserCSVList::class => function (Container $container) {
        return new UserCSVList();
    },
    UserJsonList::class => function (Container $container) {
        return new UserJsonList();
    },
];
