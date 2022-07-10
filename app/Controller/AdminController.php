<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $rooms = $this->router->route("painel.rooms");
        return view('admin/rooms', compact("rooms"));
    }
}

namespace view\admin\rooms;
class RegisterController extends Controller
{
    public function Cadastro()
    {
        // Atribui os valores de Id, name, price, class
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $class = $__POST["class"];
       
        // Caso passe por todas as verificações, atribuímos
        // os dados do usuário na superglobal $_session
        $_SESSION['id']  = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['price'] = $user['price'];
        $_SESSION['class']    = session_id();

        // retorna uma string success para o ajax
        echo json_encode("success");
        return view("view/admin/rooms");
        exit;
    }
}
namespace App\Controller;

use view\admin\rooms;
use CoffeeCode\Router\Router;

class RegisterController extends Controller
{
    public function Cadastro()
    {
        // Atribui os valores de Id, name, price, class
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $class = $__POST["class"];
       
        // Caso passe por todas as verificações, atribuímos
        // os dados do usuário na superglobal $_session
        $_SESSION['id']  = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['price'] = $user['price'];
        $_SESSION['class']    = session_id();

        // retorna uma string success para o ajax
        echo json_encode("success");
        return view("view/admin/rooms");
        exit;
    }
}

