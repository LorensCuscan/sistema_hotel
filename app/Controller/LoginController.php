<?php

namespace App\Controller;

class LoginController
{
    public function login()
    {
        echo $_POST["email"];
    }
}
