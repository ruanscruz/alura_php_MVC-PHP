<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\DBAL\Driver\PDO\Exception;

class PersistenciaController implements InterfaceRequisicoes
{
    private $cursosRepository;

    public function __construct()
    {
        $this->cursosRepository = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        try {
            if(strlen($_POST['descricao']) <= 0){
                throw new Exception('Informar curso válido!');
            }

            //proteção contra scripts
            $descricao = filter_input(
                INPUT_POST,
                'descricao',
                FILTER_SANITIZE_STRING
            );

            $curso = new Curso();
            $curso->setDescricao($descricao);
            $this->cursosRepository->persist($curso);
            $this->cursosRepository->flush();
            header('Location: /listar-cursos', true, 302);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
}