<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
    
    public function listRooms()
    {
        return view('admin/rooms');
    }
}
