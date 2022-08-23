<?php

require __DIR__ . '/../vendor/autoload.php';

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}
session_start();

//$ehRotaDeLogin = str_contains($caminho, 'login');
//if (!isset($_SESSION['LOGADO']) && $ehRotaDeLogin === false) {
//    header('Location: /login');
//    return;
//}


//Fabrica de requisicoes

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();


$classeControladora = $rotas[$caminho];

/** @var \Psr\Container\ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

/** @var \Psr\Http\Server\RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);

$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();


