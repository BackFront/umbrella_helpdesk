<?php
/**
 * <b>Authentication</b>
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
namespace Umbrella {

    class Authentication
    {

        const session_name = 'Umbrella.Authentication';

        private $EntityManeger;

        function __construct(EntityManager $EntityManeger)
        {
            $this->EntityManeger = $EntityManeger;
        }


        public function getCurrentUser()
        {
            if($this->isAuth()) :
                return $_SESSION[self::session_name];
            else:
                return false;
            endif;
        }


        public function isAuth()
        {
            if(empty($_SESSION[self::session_name]) || $_SESSION[self::session_name]['level'] < $this->Level):
                $this->Result = false;

                if(isset($_SESSION[self::session_name])) {
                    unset($_SESSION[self::session_name]);
                }
                return FALSE;
            else :
                $authUser = $DB;
                $authUser->QRSelect($TableUser, "WHERE {$this->userEmail} = :e AND {$this->userPassword} = :p AND {$this->userToken} = :t", "e={$_SESSION['userLogin']['user_email']}&p={$_SESSION['userLogin']['user_password']}&t={$_SESSION['userLogin']['user_token']}");
                if($authUser->getResult()) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            endif;
        }


    }
}