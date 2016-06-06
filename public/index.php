<?php
require(__DIR__ . '/../bootstrap.php');
use Uosh\Entity\Client;
use Uosh\Mapper\ClientMapper;
use Uosh\Service\ClientService;

//Containers
$app['ClientService'] = function($app) {
    $client = new Uosh\Entity\Client();
    $clientMapper = new ClientMapper($app['DB']);
    return new ClientService($client, $clientMapper);
};

//Routs
$app->get('/', function() use ($app) {
    return $app['twig']->render('index.twig', []);
});

$app->get('/client/register', function() use ($app) {
    $datas = array();
    $datas['name'] = "nome do cliente";
    $datas['email'] = "cliente@email.com";
    $datas['register_date'] = date('Y-m-d H-i-s');
    //$datas['adress'] = "rua comendados zazur";


    return $app['ClientService']->register($datas);
});

$app->run();
