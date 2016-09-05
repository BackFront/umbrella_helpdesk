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

use Uosh\Service\TicketService;

$app['TicketService'] = function() use ($em) {
    return new TicketService($em);
};

$app->get('/tickets/{limit}', function($limit) use ($app, $em)
{
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;
    $args->param['limit'] = $limit;

    return Controller\TicketController::getTickets($args);
});

$app->get('/tickets/', function() use ($app, $em)
{
    $args = new stdClass();
    $args->app = $app;
    $args->EntityManager = $em;

    $resp = (array) Controller\TicketController::getTickets($args);
    return json_encode($resp);
});
