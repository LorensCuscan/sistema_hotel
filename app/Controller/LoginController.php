<?php

namespace App\Controller;

use App\Model\User;

class LoginController
{
    public function login()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("{$email} não é um email valido!");
        }

        $user = User::query()
          ->where('email', '=', $email)
          ->where('password', '=', $password)
          ->get();

        if($user != false){
          echo 'Usuario Logado!';
        }
    }
}
