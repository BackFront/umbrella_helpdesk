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

        public static function viewIndex($args)
        {
            $args->auth['level'] = 100;

            if (!parent::auth($args)):
                header("Location: /");
                die("Don't try it!!!");
            endif;

            self::instantiate()->page("dashboard")
                    ->setVariable('page_title', 'Dashboard')
                    ->setVariable('scripts', '/assets/app/controllers/ctrlDashboard.js')
                    ->setVariable('scripts_footer', null)
                    ;

            return $args->app['twig']->render('dashboard.twig', self::$instance->getVariables("dashboard"));
        }

    }

}