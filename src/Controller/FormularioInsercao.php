<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = 'Novo Curso';
        include __DIR__ . '/../../view/cursos/formulario.php';
    }
}
