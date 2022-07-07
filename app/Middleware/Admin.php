<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class Admin 
{
    public function handle(Router $router)
    {
        if(!isset($_SESSION['name'])){
            return $router->redirect('login');
        }
        return true;
    }
}
