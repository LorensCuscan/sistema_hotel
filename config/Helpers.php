<?php

// Função para retornar view
if(!function_exists('view')){
    function view($view, $variable = false)
    {
        $router = $GLOBALS['router'];
        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . '/../view/' . $view . '.php';
        if (file_exists($caminhoArquivo)) {
            if (is_array($variable)) {
                extract($variable);
            }
            include($caminhoArquivo);
        }
    
        return false;
    }
}

