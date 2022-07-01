<?php

namespace App\Controller;

use App\Model\User;

class UserController extends Controller
{
    public function index()
    {
        $testandosom = 2134;

        return view('index', compact('testandosom'));
    }
}
