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
    class HomeController extends GeneralController
    {

        private $page;

        public static function login($args = null)
        {
            parent::page("login")
                    ->setVariable('user', 'testeuser')
                    ->setVariable('pass', '123');

            var_dump(parent::getVariables("login"));
            return $args->app['twig']->render('login.twig', $this->getVariables("login"));
        }


        public static function teste($args = null)
        {
            return $this->_teste($args);
        }


        public function _teste($args = null)
        {
            $datas = array();
            $datas['name'] = "nome do cliente";
            $datas['email'] = "cliente@email.com";
            $datas['register_date'] = date('Y-m-d H-i-s');
            //$datas['adress'] = "rua comendados zazur";

            return $args->app['ClientService']->register($this->page);
        }


    }
}