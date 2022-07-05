<?php

namespace App\Controller;

use Exception;

class AtriumController
{
    private $argv;
    private $functionName;

    public function __construct($argv)
    {
        $this->argv         = $argv;
        $this->functionName = lcfirst(str_replace('-', '', ucwords($argv[1], '-')));
        call_user_func(__CLASS__ . "::" . $this->functionName);
    }

    /*
     * Percorre todas as migrations e roda elas,
     * criando as tabelas no banco de dados do zero.
    */
    public static function createTables()
    {
        try{
            require __DIR__ . "/../../config/database.php";
            $contents = scandir('database/migrations');
            foreach($contents as $content) {
                if(strlen($content) > 3) {
                    $content = str_replace('.php', '', $content);
                    $result = "Database\\Migrations\\".$content;
                    new $result($capsule);
                }
            }
        } catch(Exception $e) {
            echo 'Erro: ',  $e->getMessage(), "\n";
        }
    }
}