<?php

namespace App\Middleware;

use CoffeeCode\Router\Router;

class Admin 
{
    public function handle(Router $router)
    {
        if(true){
            return true;
        }
        return $router->redirect("login");
    }
}
