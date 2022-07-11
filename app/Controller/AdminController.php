<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $rooms = $this->router->route("painel.rooms");
        return view('admin/index', compact("rooms"));
    }

    public function Cadastrar()
    {
        $cadastrar = $this->router->route("rooms/create");
        return view('admin/rooms/create', compact("rooms/create"));
    }
}




