<?php


require __DIR__ . "/vendor/autoload.php";

define("URL_BASE", "http://www.localhost/Rotas");

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