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
namespace Controller {
    class HomeController extends GeneralController implements iInstantiate
    {

        private static $instance;

        public static function instantiate()
        {
            if(empty(self::$instance)) {
                return self::$instance = new HomeController();
            }
            return self::$instance;
        }


        /**
         * @param Application $args instancia da aplicação
         * @return twig Pagina renderizada do twig
         */
        public static function login($args)
        {
            self::instantiate()->page("login")
                    ->setVariable('user', 'tteste')
                    ->setVariable('pass', '123456')
                    ->setVariable('teste', 'olá mundo');
            return $args->app['twig']->render('login.twig', self::$instance->getVariables("login"));
        }


        public static function teste($args = null)
        {
            $datas['name'] = "Douglas Alves";
            $datas['email'] = "alves.douglaz@gmail.com";
            $args->app['ClientService']->insert($datas);
        }


        public static function testeUpdate($args = null)
        {
            $datas['name'] = "Douglas Alves";
            $args->app['ClientService']->update($datas);
        }


    }
}