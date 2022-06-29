<?php

namespace App\Controller;

class Controller
{
    function view($view, $variable = false, $extension = false)
    {
        $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . '/' . APP_NAME . '/view/' . $view . '.html';

        if (file_exists($caminhoArquivo)) {
            include($caminhoArquivo);
        }

        return false;
    }
}
