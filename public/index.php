<?php

//php -S localhost:8080 -t public 

require __DIR__ . '/../vendor/autoload.php';
require '../src/Controller/ListarCurso.php';
require '../src/Controller/FormularioInsercao.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

switch ($_SERVER['REQUEST_URI']) {
    case '/listar-cursos':
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        break;
    case '/novo-curso':
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        break;
    default:
        echo "Pagina não encontrada (Error! 404)";
        break;
}
