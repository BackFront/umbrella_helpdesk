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
$app->get('/dashboard', function() {
    return "Bem vindo ao painel";
});

$app->get('/teste', function() use ($app) {
    $args = new stdClass();
    $args->app = $app;
    return Controller\HomeController::teste($args);
});

$app->get('/teste/get/{id}', function($id) use ($app) {
    $args = new stdClass();
    $args->app = $app;
    $args->userId = $id;
    $response = (array) Controller\HomeController::testeGet($args);
    return $app->json($response);
});

$app->get('/client/register', function() use ($app) {
    $args = new stdClass();
    $args->app = $app;
    return Controller\HomeController::teste($args);
});
