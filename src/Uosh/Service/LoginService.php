<?php
/**
 * <b>LoginService</b>
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

namespace Uosh\Service
{

    use Uosh\Entity\User as UserEntity;
    use Doctrine\ORM\EntityManager;
    use Umbrella\Authentication;

    class LoginService
    {

        const EntityUserPath = 'Uosh\Entity\User';

        protected $User;
        private $EntityManeger;

        function __construct(EntityManager $EntityManager)
        {
            $this->EntityManeger = $EntityManager;
        }

        /**
         * 
         * @param type $datas -> $data['user'] & $data['pass']
         * @return boolean
         */
        public function doAuth(array $datas)
        {
            session_destroy();

            /**
             * @Note: uncomment to use authentication with DQL
             * 
              $UserEntity = self::EntityUserPath;
              $query = $this->EntityManeger
              ->createQuery("SELECT u FROM {$UserEntity} u WHERE u.email=:email AND u.password=:password")
              ->setParameters($datas);

              $user = $query->getResult();
             */
            
            
            $user = $this->EntityManeger
                    ->getRepository(self::EntityUserPath)
                    ->findOneBy($datas);


            /*
             * @alterar criar verificacao de senha criptografada
             */

            if (!empty($user)):
                return Authentication::setSession($user, $this->EntityManeger);
            endif;
            return false;
        }

    }

}