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
global $em;

use Uosh\Service\LoginService;

$app['LoginService'] = function() use ($em) {
    return new LoginService($em);
};

$app->post('/login', function() use ($app, $em) {
//    $args = new stdClass();
//    $args->app = $app;
//    $args->EntityManager = $em;
//    $args->datas = $_POST;
//    $r = Controller\HomeController::actionLogin($args);


    $response['success'] = true;
    $response['message'] = "Login efetuado com sucesso";
    $response['data'] = $_POST;


    return json_encode($response);
});

$app->get('/login', function() use ($app, $em) {
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    return Controller\HomeController::viewLogin($args);
});
