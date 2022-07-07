<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class Admin 
{
    // funcao que verifica se o usuario esta logado
    // se nao estiver nao deixa acessar as rotas
    // do grupo admin
    public function handle(Router $router)
    {
        if(!isset($_SESSION['name'])){
            return $router->redirect('login');
        }
        return true;
    }
}
