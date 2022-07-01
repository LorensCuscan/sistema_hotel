<?php

// Arquivo de rotas
$router->group(null);
$router->get("/", "HomeController:index");

// Grupo de rotas /admin
$router->group("/admin");
$router->get("/", "AdminController:index");

// Executa as rotas
$router->dispatch();

// Trata os erros
if ($router->error()) {
    echo "test";
    var_dump($router->error());
}
