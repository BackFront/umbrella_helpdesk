<?php
/**
 * <b>Home</b>
 * 
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

namespace Controller
{

    class TicketController extends GeneralController implements iInstantiate
    {

        private static $instance;

        public static function instantiate()
        {
            if (empty(self::$instance)) {
                return self::$instance = new self;
            }
            return self::$instance;
        }

        public static function getTickets($args)
        {
            /**
             * @alterar inserir verificacao if(current_user_can('admin_tickets'))
             */
            $limit = (!empty($args->param['limit'])) ? $args->param['limit'] : null;
            $status = (!empty($args->param['status'])) ? $args->param['status'] : null;

            $r = $args->app['TicketService']
                    ->setLimit($limit)
                    ->setStatus($status)
                    ->getTickets();

            if ($r) {
                $response['success'] = true;
                $response['message'] = "Dados retornados com sucesso";
                $response['data'] = $r;
            } else {
                $response['success'] = false;
                $response['message'] = "Erro ao retornar dados";
                $response['data'] = $r;
            }
            return $response;
        }

        static function viewTickets($args)
        {
            $tickets = self::getTickets($args);

            if (!$tickets)
                return $tickets;

            foreach ($tickets['data'] as $key => $value) {
                $itens[] = array(
                    "id" => $value['id'],
                    "hash" => $value['hash'],
                    "date" => $value['creation_date']['date'],
                    //"description" => $value['id'],
                    "label" => "red",
                    "priority" => "Urgente",
                    "client" => [
                        "id" => $value['user']['id'],
                        "name" => $value['user']['name'],
                        "company" => [
                            "id" => "Igeeker",
                            "name" => "Igeeker"
                        ]
                ]);
            }

            return $args->app['twig']->render('tickets/cards.twig', array(
                        "itens" => $itens
            ));
        }

    }

}