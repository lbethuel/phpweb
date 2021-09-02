<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
     include __DIR__ . '/../../view/cursos/formulario.php';
    }

}