<?php

//php -S localhost:8080 -t public 

require __DIR__ . '/../vendor/autoload.php';
require '../src/Controller/ListarCurso.php';
require '../src/Controller/FormularioInsercao.php';
require '../src/Controller/Exclusao.php';

$caminho = explode("?", $_SERVER['REQUEST_URI']);



$rotas = require  __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho[0], $rotas)) {
    http_response_code(404);
    exit();
}

//var_dump( $rotas);
$classeControladora = $rotas[$caminho[0]];
$controlador = new $classeControladora();
$controlador->processaRequisicao();
//var_dump($_SERVER['REQUEST_URI']);
