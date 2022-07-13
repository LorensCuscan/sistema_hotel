<?php

namespace App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('site/index');
    }

    public function login()
    {
        return view('site/login');
    }
    
}
