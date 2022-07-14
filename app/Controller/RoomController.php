<?php

namespace App\Controller;

use App\Model\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view("admin/rooms/index", compact("rooms"));
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

        $retorno = json_encode("Quarto criado com sucesso!");
        $retorno1 = json_encode("Dados invalidos!");

        $name = $_POST["name"];
        $price = $_POST["price"];
        $classe = $_POST["classe"];

        if(empty($name) || empty($price) || empty($classe)){
            echo json_encode("$retorno1");
        } else {
            echo json_encode($retorno);
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