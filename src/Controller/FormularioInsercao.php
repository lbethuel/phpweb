<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerComHtml implements InterfaceControladorRequisicao
{

    /* public function processaRequisicao(): void
    {
        $titulo = 'Novo Curso';
        include __DIR__ . '/../../view/cursos/formulario.php';
    } */

    public function processaRequisicao(): void
    {
        $this->renderizaHtml('cursos/formulario.php', [
            'titulo' => 'Novo Curso'
        ]);
    }
}


