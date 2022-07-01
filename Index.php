<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/config.php";
require __DIR__ . "/database.php";
require __DIR__ . "/helpers.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("App\Controller");
$router->group(null);

require_once __DIR__ . "/routes.php";

$router->dispatch();

if ($router->error()) {
    echo "test";
    var_dump($router->error());
}