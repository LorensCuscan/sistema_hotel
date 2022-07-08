<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $rooms = $this->router->route("painel.rooms");
        return view('admin/index', compact("rooms"));
    }
    
    public function listRooms()
    {
        return view('admin/rooms');
    }
}
