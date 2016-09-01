<?php
require(__DIR__ . '/../bootstrap.php');

use Uosh\Entity\Client;
use Uosh\Service\ClientService;

//Containers
$app['ClientService'] = function() use ($em) {
    $client = new Uosh\Entity\Client();
    return new ClientService($em);
};

$app->get('/', function() use ($app, $em) {
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    return Controller\HomeController::viewHome($args);
});

$app->get('/tikets/open', function() use ($app, $em) {
    return 'ola';
});

//Loading controllers include
include_once (__DIR__ . DIRECTORY_SEPARATOR . 'login.php');
include_once (__DIR__ . DIRECTORY_SEPARATOR . 'dashboard.php');
include_once (__DIR__ . DIRECTORY_SEPARATOR . 'testes.php');

$app->run();
