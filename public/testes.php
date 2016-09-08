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
$app->get('/teste', function() use ($app, $em) {
    $args = new stdClass();
    $args->app = $app;

    
    
    
//    
//>select('a', 'u')
//        ->from('Credit\Entity\UserCreditHistory', 'a')
//        ->leftJoin('a.user', 'u')
//        ->where('u = :user')
//        ->setParameter('user', $users)
//        ->orderBy('a.created_at', 'DESC');
    
    
    
    //teste left join
    
    
    $query = $em->createQueryBuilder()
            ->select('u', 'c')
            ->from('Uosh\Entity\Company', 'u')
            ->leftJoin('u.id_user', 'c')
            ->getQuery()
            ->getArrayResult();

    $tickets = (array)$query[0];
    return $app->json($tickets);

    //return Controller\HomeController::teste($args);
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

//retorna todas as sessoes
$app->get('/teste/session', function() use ($app) {
    var_dump($_SESSION);
    return '<hr>';
});

//destroi todas as sessoes
$app->get('/teste/session/destroy', function() {
    session_destroy();
    var_dump($_SESSION);
    return '<hr>';
});
