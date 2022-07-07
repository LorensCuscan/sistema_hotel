<?php

namespace App\Controller;

class Controller
{
    protected $router;

    // Funcao para pegarmos a variavel router em qualquer controller
    public function __construct($router)
    {
        $this->router = $router;
    }
}
