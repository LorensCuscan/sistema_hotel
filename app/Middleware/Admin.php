<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class Admin 
{
    public function handle(Router $router)
    {
        return $router->redirect("login");
    }
}
