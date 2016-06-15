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
namespace Uosh\Service {

    use Uosh\Entity\User as UserEntity;
    use Doctrine\ORM\EntityManager;

    class LoginService
    {

        const EntityPath = 'Uosh\Entity\User';

        protected $User;
        private $EntityManeger;

        function __construct(EntityManager $EntityManager)
        {
            $this->EntityManeger = $EntityManager;
        }


        public function doAuth()
        {
            return true;
        }


    }
}