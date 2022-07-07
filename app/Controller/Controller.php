<?php

namespace App\Controller;

class Controller
{
    protected $router;

    public function __construct($router)
    {
        $this->router = $router;
    }
}
