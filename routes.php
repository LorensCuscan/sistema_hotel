<?php

// Arquivo de rotas
$router->get("/", function ($data){
    echo "<h1> ola mundo</h1>";
});

$router->get("/site", "UserController:index");
