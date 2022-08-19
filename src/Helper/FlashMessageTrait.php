<?php

namespace Alura\Cursos\Helper;

trait FlashMessageTrait
{
    public function defineFlash(string $tipo, string $mensagem) : void
    {
        $_SESSION['tipo_mensagem'] = $tipo;
        $_SESSION['mensagem'] = $mensagem;
    }
}