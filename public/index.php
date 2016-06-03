<?php
require(__DIR__ . '/../bootstrap.php');
use Uosh\Entity\Client;
use Uosh\Mapper\ClientMapper;
use Uosh\Service\ClientService;

//Containers
$app['ClientService'] = function() {
    $client = new Client();
    $clientMapper = new ClientMapper();
    return new ClientService($client, $clientMapper);
};

//Routs
$app->get('/', function() use ($app) {
    return
            $app['twig']->render('index.twig', []);
});

$app->get('/client/register', function() use ($app) {
    $datas = array();
    $datas['name'] = "nome do cliente";
    $datas['email'] = "cliente@email.com";
    $datas['adress'] = "rua comendados zazur";

    $app['ClientService']->register($datas);
});

$app->run();
