<?php

if(!function_exists('view')){
    function view($view, $variable = false)
    {
        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . '/' . APP_NAME . '/view/' . $view . '.php';
    
        if (file_exists($caminhoArquivo)) {
            if (is_array($variable)) {
                extract($variable);
            }
            include($caminhoArquivo);
        }
    
        return false;
    }
}
