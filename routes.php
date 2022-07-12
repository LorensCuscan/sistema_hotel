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

// Grupo de rotas /admin
$router->group("/admin", \App\Middleware\Admin::class);
$router->get("/", "AdminController:index", "painel");
$router->get("/rooms", "AdminController:listRooms", "painel.rooms");


$router->group("/admin/rooms", \App\Middleware\Admin::class);
$router->get("/", "RoomController:index");
$router->get("/create", "RoomController:create");
$router->post("/store", "RoomController:store");

// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    var_dump($router->error());
}
