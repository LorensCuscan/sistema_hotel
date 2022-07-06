<?php

namespace App\Controller;


// Classe para gerenciar os comandos CLI (de terminal)
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
        echo "Tabelas criadas com sucesso";
    }

    /*
     * Cria usuários na tabela users
    */
    public static function addUsers()
    {
        require __DIR__ . "/../../config/database.php";
        try{

            \App\Model\User::query()->updateOrcreate(
                ['email'    => 'lorenscuscan@gmail.com'],[
                'name'     => 'Lorens Cuscan',
                'password' => '12345678',
                'admin'    => 1
            ]); 
            echo "\nLorens Cuscan Adicionado Com Sucesso.\n";

            \App\Model\User::query()->updateOrcreate(
                ['email'    => 'lucascastellani@gmail.com'],[
                'name'     => 'Lucas Castellani',
                'password' => '12345678',
                'admin'    => 1
            ]);
            echo "Lucas Castellani Adicionado com sucesso.\n";

        } catch(\Illuminate\Database\QueryException $e) {
            echo dd("\nErro => ".$e->getMessage()."\\n");
        }
    }
}