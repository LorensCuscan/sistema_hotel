<?php

namespace App\Controller;

use App\Model\Room;

class RoomController extends Controller
{
    public function index()
    {
        return view("admin/rooms/index");
    }

    public function create()
    {
        return view("admin/rooms/create");
    }

    public function edit()
    {
        
    }

    public function store()
    {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $classe = $_POST["classe"];

        if(empty($name) || empty($price) || empty($classe)){
            return json_encode("Todos os campos são obrigatórios!");
        }

        $room = Room::query()
            ->create([
                'name' => $name,
                'price' => $price,
                'class' => $classe
            ]);            
            
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}