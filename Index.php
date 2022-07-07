<?php
    
session_start();

require_once __DIR__ . "/vendor/autoload.php";

// Arquivo de constantes para sabermos os dados do projeto
require_once __DIR__ . "/config.php";

// Arquivo com funções que podem nos ajudar durante o desenvolvimento
require_once __DIR__ . "/config/helpers.php";

// Arquivo que faz a conexão com o banco de dados
require_once __DIR__ . "/config/database.php";

// Arquivo de rotas
require_once __DIR__ . "/routes.php";

