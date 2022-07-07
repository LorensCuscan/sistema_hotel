<?php

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);
$router->namespace("App\Controller");


// Arquivo de rotas
$router->group(null);
$router->get("/", "HomeController:index", "index");

// rota de login
$router->get("/login", "HomeController:login", "login");
$router->post("/login", "LoginController:login");

$router->get("/logout", "LoginController:logout", "logout");

//rota de check-in e check-out
$router->post("/reserva", "CheckinController");

// Grupo de rotas /admin
$router->group("/admin", \App\Middleware\Admin::class);
$router->get("/", "AdminController:index", "painel");

// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    var_dump($router->error());
}
