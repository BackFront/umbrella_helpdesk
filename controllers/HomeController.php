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

    use Umbrella\Authentication;

    class HomeController extends GeneralController implements iInstantiate
    {

        private static $instance;

        public static function instantiate()
        {
            if(empty(self::$instance)){
                return self::$instance = new HomeController();
            }
            return self::$instance;
        }

        public static function viewHome($args)
        {
            return self::viewLogin($args);
        }

        public static function viewLogin($args)
        {
            $args->auth['level'] = 100;
            (self::auth($args)) ? header("Location: /dashboard") : null; //verify if the user is logged

            self::instantiate()->page("login")
                    ->setVariable('page_title', 'Login')
                    ->setVariable('box_title', 'Online Helpdesk');

            return $args->app['twig']->render('login.twig', self::$instance->getVariables("login"));
        }

        public static function actionLogin($args)
        {
            $r = $args->app['LoginService']->doAuth($args->datas);
            if($r){
                $response['success'] = true;
                $response['message'] = "Login efetuado com sucesso";
                $response['data'] = $r;
            } else {
                $response['success'] = false;
                $response['message'] = "Não foi possivel efetuar o login";
                $response['data'] = $r;
            }
            return $response;
        }

        private static function auth($args)
        {
            $is_auth = new Authentication($args->EntityManager);
            $is_auth->setLevel($args->auth['level']);

            if($is_auth->isAuth()):
                return true;
            endif;
            return false;
        }

    }

}