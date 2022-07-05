<?php

namespace App\Controller;

class AtriumController
{
    private $argv;
    private $functionName;

    /*
     * Pega o comando inserido no array argv
     *  e verifica se existe uma função para ele
    */
    public function __construct($argv)
    {
        $this->argv = $argv;
        $this->functionName = lcfirst(str_replace('-', '', ucwords($argv[1], '-')));

        if(method_exists(__CLASS__, $this->functionName)){
            return call_user_func(__CLASS__ . "::" . $this->functionName);
        };

        echo 'Comando não encontrado, verifique a lista de comandos em Atrium.';
    }

    /*
     * Percorre todas as migrations e roda elas,
     * criando as tabelas no banco de dados do zero.
    */
    public static function createTables()
    {
        require __DIR__ . "/../../config/database.php";
        $filesFound = scandir('database/migrations');
        foreach($filesFound as $fileFound) {
            if(strlen($fileFound) > 3) {
                $className = str_replace('.php', '', $fileFound);
                $result = "Database\\Migrations\\".$className;
                new $result($capsule);
            }
        }
    }
}