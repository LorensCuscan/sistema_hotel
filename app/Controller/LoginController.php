<?php

namespace App\Controller;

class LoginController
{
    public function login()
    {
        echo $_POST["email"];
        echo $_POST["password"];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email é um email valido");
          } else {
            echo("$email não é um email valido!");
          }
          
    }
}
