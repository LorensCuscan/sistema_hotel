<?php

// Arquivo de rotas
$router->group(null);
$router->get("/", "HomeController:index", "index");
$router->get("/login", "AdminController:index", "login");


// Grupo de rotas /admin
$router->group("/admin", \App\Middleware\Admin::class);
$router->get("/", "AdminController:login", "painel");


// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    var_dump($router->error());
}
