<?php

use Alura\Cursos\Controller\ListaCursosController;
use Alura\Cursos\Controller\NovosCursosController;

require __DIR__ . '/../vendor/autoload.php';

// URL's amigáveis
if(key_exists('PATH_INFO', $_SERVER)) {
    switch ($_SERVER['PATH_INFO']) {
        case '/home': break;
        case '/listar-cursos':
            return (new ListaCursosController())->processaRequisicao(); break;
        case '/novo-curso':
            return (new NovosCursosController())->processaRequisicao(); break;
        default: echo 'Erro 404';
    }
}

