<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizaHtmlTrait;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    use RenderizaHtmlTrait;
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('cursos/formulario.php', [
            'titulo' => 'Novo curso'
        ]);
    }
}
