<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/config.php";
require __DIR__ . "/migrate.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("App\Controller");
$router->group(null);

include_once __DIR__ . "/routes.php";

$router->dispatch();

if ($router->error()) {
    echo "test";
    var_dump($router->error());
}