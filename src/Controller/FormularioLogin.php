<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizaHtmlTrait;

class FormularioLogin implements InterfaceControladorRequisicao
{
    use RenderizaHtmlTrait;
	public function processaRequisicao(): void
	{
		echo $this->renderizaHtml('login/formulario.php', [
			'titulo' => 'Login'
		]);
	}
}