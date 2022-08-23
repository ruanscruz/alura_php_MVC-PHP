<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;


class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private EntityManagerInterface $entityManager;
    private EntityRepository $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var($request->getParsedBody()['email'], FILTER_VALIDATE_EMAIL);

        if (is_null($email) || $email === false) {
            $this->defineFlash('danger', 'O e-mail digitado não é um e-mail válido');
            return new Response(403, ['Location' => '/login']);
        }

        $senha = filter_var($request->getParsedBody()['senha'], FILTER_SANITIZE_STRING);

        /** @var  $usuario */
        $usuario = $this->repositorioUsuarios
            ->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $this->defineFlash('danger', 'E-mail ou senha inválidos');
            return new Response(403, ['Location' => '/login']);
        }

        $_SESSION['LOGADO'] = true;

        return new Response(200, ['Location' => '/listar-cursos'], '');
    }
}