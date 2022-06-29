<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Model\User;

class UserController extends Controller
{
    public function index()
    {
       $teste = 'olamundo';

        return $this->view('index');
    }
}
