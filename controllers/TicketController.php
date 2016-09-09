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
                $label = self::getLabelTicket($value['priority']);
                //echo $label['label']."<br>";
                //echo $value['priority'];
                $itens[] = array(
                    "id" => $value['id'],
                    "hash" => substr($value['hash'], 0, 10),
                    "date" => $value['creation_date']['date'],
                    "description" => $value['description'],
                    "label" => $label['color'],
                    "priority" => $label['label'],
                    "client" => [
                        "id" => $value['user']['id'],
                        "name" => $value['user']['name'],
                        "company" => [
                            "id" => $value['user']['company']['id'],
                            "name" => $value['user']['company']['name']
                        ]
                ]);
            }

            return $args->app['twig']->render('tickets/cards.twig', array(
                        "itens" => $itens
            ));
        }

        static function getLabelTicket($priority)
        {
            switch ($priority):

                case 'low':
                    $label['color'] = 'green';
                    $label['label'] = 'Baixa';
                    break;

                case 'normal':
                    $label['color'] = 'blue';
                    $label['label'] = 'Normal';
                    break;

                case 'medium':
                    $label['color'] = 'orange';
                    $label['label'] = 'Media';
                    break;

                case 'high':
                    $label['color'] = 'red';
                    $label['label'] = 'Urgente';
                    break;

            endswitch;
            return $label;
        }

    }

}