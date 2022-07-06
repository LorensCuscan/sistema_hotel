<?php

namespace App\Controller;

class LoginController
{
    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("{$email} não é um email valido!");
        }
          
    }
}
