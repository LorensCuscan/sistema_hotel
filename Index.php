<?php


require __DIR__ . "/vendor/autoload.php";

require __DIR__ . "/Config.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);


$router->get("/", function ($data){
    echo "<h1> ola mundo</h1>";
});

$router->get("/site", function ($data){
    echo "<h1> site</h1>";
});

$router->dispatch();

if ($router->error()) {
    var_dump($router->error());
}