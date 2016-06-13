<?php
/**
 * <b>Session</b>
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
namespace Uosh\Entity {


    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="sessions")
     */
    class Session
    {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;
        /**
         * @ORM\ManyToOne(targetEntity="Uosh\Entity\User")
         * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
         */
        private $user;
        /**
         * @ORM\Column(type="string", length=128)
         */
        private $token;
        /**
         * @ORM\Column(type="integer")
         */
        private $level;
        /**
         * @ORM\Column(type="datetime")
         */
        private $expiration_date;
        /**
         * @ORM\Column(type="datetime")
         */
        private $last_access_time;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $last_access_ip;
        /**
         * @ORM\Column(type="datetime")
         */
        private $current_access_time;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $current_access_ip;

    }
}