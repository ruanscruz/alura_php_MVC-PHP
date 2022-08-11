<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListaCursosController implements InterfaceRequisicoes
{
    private $cursosRepository;

    public function __construct()
    {
        $this->cursosRepository = (new EntityManagerCreator())
	        ->getEntityManager()
	        ->getRepository(Curso::class);
    }


    public function processaRequisicao(): void
    {
        $titulo = 'Lista de cursos';
        $cursos = $this->cursosRepository->findAll();
		require __DIR__ . '/../../view/cursos/lista-cursos.php';
    }

}