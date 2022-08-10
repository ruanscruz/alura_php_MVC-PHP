<?php

// URL's amigáveis
if(key_exists('PATH_INFO', $_SERVER)) {
    switch ($_SERVER['PATH_INFO']) {
        case '/home': break;
        case '/listar-cursos':
            require 'listar-cursos.php'; break;
        case '/novo-curso':
            require 'formulario-novo-curso.php'; break;
        default: echo 'Erro 404';
    }
}

