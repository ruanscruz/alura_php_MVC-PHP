<?php

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../src/router/routes.php';

if(!array_key_exists($path, $rotas)) {
    http_response_code(404); exit();
}

($rotas[$path])->processaRequisicao();

