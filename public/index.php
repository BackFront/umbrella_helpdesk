<?php
require(__DIR__ . '/../bootstrap.php');
use Uosh\Entity\Client;
use Uosh\Mapper\ClientMapper;
use Uosh\Service\ClientService;

//Containers
$app['rw'] = function() use ($app) {
    $client = new Client();
    $clientMapper = new ClientMapper($app['DB']);
    return new ClientService($client, $clientMapper);
};

//Routs
$app->get('/', function() use ($app) {
    return $app['twig']->render('index.twig', []);
});

$app->get('/client/register', function() use ($app) {

    var_dump($app);

    $datas;
    $datas['name'] = "nome do cliente";
    $datas['email'] = "cliente@email.com";
    //$datas['register_date'] = date('Y-m-d H-i-s');
    //$datas['adress'] = "rua comendados zazur";

    $app['ClientService']->register($datas);
});

$app->run();
