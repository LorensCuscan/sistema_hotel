<?php

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("App\Controller");


// Arquivo de rotas
$router->group(null);
$router->get("/", "HomeController:index", "index");
$router->get("/login", "AdminController:index", "login");
$router->post("/login", "LoginController:login");

// Grupo de rotas /admin
$router->group("/admin", \App\Middleware\Admin::class);
$router->get("/", "AdminController:login", "painel");
$router->get("/banana", "AdminController:login", "painel");

// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    var_dump($router->error());
}
