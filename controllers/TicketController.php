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
            return $args->app['TicketService']->setLimit($limit)->getTickets();
        }

    }

}