<?php

// Arquivo de rotas
$router->group(null);
$router->get("/", "HomeController:index");

// Grupo de rotas /admin
$router->group("/admin");
$router->get("/", "AdminController:login");
$router->get("/login", "AdminController:index");

// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    var_dump($router->error());
}
