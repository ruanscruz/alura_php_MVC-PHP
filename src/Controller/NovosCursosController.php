<?php

namespace Alura\Cursos\Controller;

class NovosCursosController implements InterfaceRequisicoes
{

    public function processaRequisicao(): void
    {
        $titulo = 'Novo curso';
        require __DIR__ . '/../../view/cursos/add-novos-cursos.php';
    }

}