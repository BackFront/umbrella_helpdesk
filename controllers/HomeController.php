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


        public static function home($args)
        {
            return self::viewLogin($args);
        }


        public static function viewLogin($args)
        {
            $is_auth = \Umbrella\Authentication::isAuth($args->EntityManager);
            if($is_auth):
                header("Location: /dashboard");
            endif;

            self::instantiate()->page("login")
                    ->setVariable('page_title', 'Login')
                    ->setVariable('box_title', 'Online Helpdesk');

            return $args->app['twig']->render('login.twig', self::$instance->getVariables("login"));
        }


        public static function actionLogin($args)
        {
            $user['user'] = $args->datas;
            $user['pass'] = $args->datas;

            if($args->app['LoginService']->doAuth()) {
                $response['success'] = true;
                $response['message'] = "Login efetuado com sucesso";
                $response['data'] = $args->datas;
            } else {
                $response['success'] = false;
                $response['message'] = "Não foi possivel efetuar o login";
            }
            return $response;
        }


        public static function teste($args = null)
        {
            $datas['name'] = "Douglas Alves";
            $datas['email'] = "alves.douglaz@gmail.com";
            $args->app['ClientService']->insert($datas);
        }


        public static function testeGet($args = null)
        {
            return $args->app['ClientService']->find($args->userId);
        }


    }
}