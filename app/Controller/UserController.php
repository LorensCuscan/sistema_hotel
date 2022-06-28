<?php

namespace App\Controller;

use App\Model\User;

class UserController
{
    public function index()
    {
        $user = User::create([
            'name'     => 'lorens',
            'password' => '123456',
            'email'    => 'cuscan@gmail.com',
        ]);
        var_dump($user);
    }
}
