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

    class DashboardController extends GeneralController implements iInstantiate
    {

        private $auth;
        private static $instance;

        public static function instantiate()
        {
            if (empty(self::$instance)) {
                return self::$instance = new self;
            }
            return self::$instance;
        }

        static function viewCards($args)
        {
            return $args->app['twig']->render('components/card.twig', array(
                        "itens" => [
                            array(
                                "id" => 2356,
                                "hash" => "#9abe75c9ee6",
                                "date" => "22/jan/2016",
                                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
                                "label" => "red",
                                "priority" => "Urgente",
                                "client" => [
                                    "id" => 21,
                                    "name" => "Pedro",
                                    "company" => [
                                        "id" => "Igeeker",
                                        "name" => "Igeeker"
                                    ]
                                ]),
                            array(
                                "id" => 1554,
                                "hash" => "#9abe75c9ee6",
                                "date" => "22/jan/2016",
                                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
                                "label" => "blue",
                                "priority" => "Normal",
                                "client" => [
                                    "id" => 15,
                                    "name" => "Felipe",
                                    "company" => [
                                        "id" => 4456,
                                        "name" => "SNDDigitall"
                                    ]
                                ]),
                            array(
                                "id" => 1645,
                                "hash" => "#9abe75c9ee6",
                                "date" => "22/jan/2016",
                                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
                                "label" => "orange",
                                "priority" => "Alta",
                                "client" => [
                                    "id" => 1,
                                    "name" => "Douglas",
                                    "company" => [
                                        "id" => 123854,
                                        "name" => "OpenCode"
                                    ]
                                ]),
                            array(
                                "id" => 1645,
                                "hash" => "#9abe75c9ee6",
                                "date" => "22/jan/2016",
                                "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
                                "label" => "black",
                                "priority" => "Fechado",
                                "client" => [
                                    "id" => 1,
                                    "name" => "Douglas",
                                    "company" => [
                                        "id" => 123854,
                                        "name" => "OpenCode"
                                    ]
                                ])
                        ]
            ));
        }

        public static function viewIndex($args)
        {
            $args->auth['level'] = 100;

            if (!parent::auth($args)):
                header("Location: /");
                die("Don't try it!!!");
            endif;

            self::instantiate()->page("dashboard")
                    ->setVariable('page_title', 'Dashboard')
                    ->setVariable('cards_all', self::viewCards($args));

            return $args->app['twig']->render('dashboard.twig', self::$instance->getVariables("dashboard"));
        }

    }

}