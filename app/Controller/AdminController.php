<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('admin/login');
    }

    public function login()
    {
        return view('admin/login');
    }
}
