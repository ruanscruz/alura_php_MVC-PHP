<?php

use Alura\Cursos\Controller\ListaCursosController;
use Alura\Cursos\Controller\NovosCursosController;
use Alura\Cursos\Controller\PersistenciaController;

$rotas = [
    '/listar-cursos' => (new ListaCursosController),
    '/novo-curso' => (new NovosCursosController()),
    '/salvar-curso' => (new PersistenciaController())
];

return $rotas;