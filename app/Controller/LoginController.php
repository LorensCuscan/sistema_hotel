<?php

namespace App\Controller;

use App\Model\User;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function login()
    {
        // Atribui os valores de email e password a variaveis
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Valida se o usuário inseriu um email e se ele é valido
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode("Email Inválido.");
            exit;
        }

        // Valida se o usuário inseriu uma senha
        if(empty($password)){
            echo json_encode("Insira uma senha.");
            exit;
        }

        // Faz a query para pegar o usuário com login e senha inseridos
        $user = User::where('email', $email)
          ->where('password', $password)
          ->first()
          ->toArray();

        // Se a buscar não encontrar nada, retorna erro
        if(empty($user)){
            echo json_encode("Email/Senha não encontrados, verifique suas credenciais.");
            exit;
        }
       
        // Caso passe por todas as verificações, atribuímos
        // os dados do usuário na superglobal $_session
        $_SESSION['name']  = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['id']    = session_id();

        // retorna uma string success para o ajax
        echo json_encode("success");
        exit;
    }

    public function logout()
    {
        session_destroy();
        return Route::redirect('/');
    }
}
