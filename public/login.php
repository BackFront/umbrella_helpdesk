<?php

/**
 * Project Name: UOSH
 * Project URI: https://github.com/backfront/Uosh
 * Description: Umbrella Online Systen Helpdesk
 * Version: 1.0.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Umbrella
 * @subpackage UOSH
 * @version 1.0.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/backfront/ Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0.0
 */
use Uosh\Service\LoginService;
use Symfony\Component\HttpFoundation\Request;

global $em;


$app['LoginService'] = function() use ($em)
{
    return new LoginService($em);
};

$app->post('/login', function(Request $request) use ($app, $em)
{   
    $datas = (array) json_decode($request->getContent());
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    $args->datas = $datas;
    $response = Controller\HomeController::actionLogin($args);
    return json_encode($response);
});

$app->get('/login', function() use ($app, $em)
{
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;

    return Controller\HomeController::viewLogin($args);
});

$app->get('/logout', function() use ($app, $em)
{
    session_destroy();
    header("Location: /");
    die;
});
