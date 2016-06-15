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
$app->post('/login', function() use ($app) {
    $r = array(
        "response" => "success",
        "message" => "Logando...",
    );
    return $app->json($r);
});

$app->get('/login', function() use ($app, $em) {
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    return Controller\HomeController::login($args);
});
