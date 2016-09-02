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

namespace Umbrella
{

    use Uosh\Entity\Session as SessionEntity;
    use Doctrine\ORM\EntityManager;

    class Authentication
    {

        const session_name = 'Umbrella.Authentication';
        const EntitySessionPath = 'Uosh\Entity\Session';

        private $EntityManeger;
        private $level = 100;

        function __construct(EntityManager $EntityManeger)
        {
            $this->EntityManeger = $EntityManeger;
        }

        public function setLevel($level)
        {
            $this->level = $level;
        }

        public function getCurrentUser()
        {
            if ($this->isAuth()) :
                return $_SESSION[self::session_name];
            else:
                return null;
            endif;
        }

        /**
         * 
         * @param userEntity $user object of the user entity
         * @param \Umbrella\EntityManager $EntityManeger
         * @return type
         */
        public function setSession($user, EntityManager $EntityManeger)
        {
            if ($this->isAuth($EntityManeger))
                return $_SESSION[self::session_name];

            $sessionEntity = new SessionEntity();
            $sessionEntity->setUser($user);
            $sessionEntity->setToken(md5(time() . $user->getEmail()));
            $sessionEntity->setLevel($user->getLevel());
            $sessionEntity->setExpiration_date(new \DateTime("tomorrow"));
            $sessionEntity->setCompany($user->getCompany());
            $sessionEntity->setAccess_time(new \DateTime("now"));
            $sessionEntity->setAccess_ip($_SERVER['REMOTE_ADDR']);

            $EntityManeger->persist($sessionEntity);
            $EntityManeger->flush();

            $sessionArray['token'] = $sessionEntity->getToken();
            $sessionArray['level'] = $sessionEntity->getLevel();
            $sessionArray['user.id'] = $sessionEntity->getUser()->getId();
            $sessionArray['user.name'] = $sessionEntity->getUser()->getName();
            $sessionArray['user.email'] = $sessionEntity->getUser()->getEmail();
            $sessionArray['expiration'] = $sessionEntity->getExpiration_date();

            return $_SESSION[self::session_name] = $sessionArray;
        }

        public function isAuth($EntityManeger = null)
        {
            $EntityManeger = ($EntityManeger != null)? : $this->EntityManeger;
            if (empty($_SESSION[self::session_name]) || $_SESSION[self::session_name]['level'] < $this->level):

                if (isset($_SESSION[self::session_name])) {
                    unset($_SESSION[self::session_name]);
                    session_destroy();
                }
                return false;
            else :
                $session = $EntityManeger->getRepository(self::EntitySessionPath)
                        ->findOneBy([
                    'access_ip' => $_SERVER['REMOTE_ADDR'],
                    'token' => $_SESSION[self::session_name]['token']
                ]);

                if ($session) {
                    return $this->isAutentichSession($session);
                } else {
                    unset($_SESSION[self::session_name]);
                    session_destroy();
                    return false;
                }
            endif;
        }
        
        protected function isAutentichSession(SessionEntity $Session)
        {
            $user = $Session->getUser();
            if ($user->getId() == $_SESSION[self::session_name]['user.id'] && $user->getEmail() == $_SESSION[self::session_name]['user.email']) {
                return $_SESSION[self::session_name];
            }
            return false;
        }

    }

}