<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizaHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
{
    use RenderizaHtmlTrait;
	public function handle(ServerRequestInterface $request): ResponseInterface
	{
        $html = $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login'
        ]);

        return new Response(200, [], $html);
	}
}