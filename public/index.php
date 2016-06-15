<?php
require(__DIR__ . '/../bootstrap.php');

use Uosh\Entity\Client;
use Uosh\Service\ClientService;

//Containers
$app['ClientService'] = function() use ($em) {
    $client = new Uosh\Entity\Client();
    return new ClientService($em);
};

//Routs
$app->get('/', function() use ($app, $em) {
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    return Controller\HomeController::home($args);
});

//Loading controllers include
include_once (__DIR__ . DIRECTORY_SEPARATOR . 'login.php');
include_once (__DIR__ . DIRECTORY_SEPARATOR . 'testes.php');

$app->run();
