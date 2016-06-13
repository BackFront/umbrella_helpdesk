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

    use Uosh\Entity\Session as SessionEntity;

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
                return null;
            endif;
        }


        public static function isAuth($EntityManeger = null)
        {
            $EntityManeger = ($EntityManeger != null)? : $this->EntityManeger;

            if(empty($_SESSION[self::session_name]) || $_SESSION[self::session_name]['level'] < $this->Level):

                if(isset($_SESSION[self::session_name])) {
                    unset($_SESSION[self::session_name]);
                }
                return FALSE;
            else :
                $entity_session_path = 'Uosh\Entity\Session';
                $EntityManeger->getRepository($entity_session_path);

                $Session = $clientEntity->findBy(['token' => $_SESSION['token']]);

                /**
                 * @alterar Criar verificação entre a entidade do usuario retorinado pela variavel $Session e os dados gravados na sessão 
                 * ex:
                 * if($Session->getUser->getEmail == $_SESSION['user_email'] && $Session->getUser->getPassword == $_SESSION['user_password']) return true;
                 */
                if($Session) {
                    return $Session;
                } else {
                    return false;
                }
            endif;
        }


    }
}