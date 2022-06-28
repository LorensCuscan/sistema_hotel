<?php

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/config.php";
require __DIR__ . "/migrate.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("App\Controller");
$router->group(null);

$router->get("/", function ($data){
    echo "<h1> ola mundo</h1>";
});

$router->get("/site", "UserController:index");
 


$router->dispatch();

if ($router->error()) {
    echo "test";
    var_dump($router->error());
}