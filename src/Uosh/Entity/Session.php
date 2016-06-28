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
namespace Uosh\Entity
{

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="sessions")
     */
    class Session
    {

        //----------------------------------------------------------------------
        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;
        //----------------------------------------------------------------------
        /**
         * @ORM\ManyToOne(targetEntity="Uosh\Entity\User")
         * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
         */
        private $user;
        //----------------------------------------------------------------------
        /**
         * @ORM\ManyToOne(targetEntity="Uosh\Entity\Company")
         * @ORM\JoinColumn(name="id_company", referencedColumnName="id")
         */
        private $company;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="string", length=128)
         */
        private $token;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="integer")
         */
        private $level;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="datetime")
         */
        private $expiration_date;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="datetime")
         */
        private $access_time;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $access_ip;

        //----------------------------------------------------------------------
        // ===== GETTERS
        //----------------------------------------------------------------------
        function getId()
        {
            return $this->id;
        }

        function getUser()
        {
            return $this->user;
        }

        function getCompany()
        {
            return $this->company;
        }

        function getToken()
        {
            return $this->token;
        }

        function getLevel()
        {
            return $this->level;
        }

        function getExpiration_date()
        {
            return $this->expiration_date;
        }

        function getAccess_time()
        {
            return $this->access_time;
        }

        function getAccess_ip()
        {
            return $this->access_ip;
        }

        //----------------------------------------------------------------------
        // ===== SETTERS
        //----------------------------------------------------------------------

        function setUser($user)
        {
            $this->user = $user;
        }

        function setCompany($company)
        {
            $this->company = $company;
        }

        function setToken($token)
        {
            $this->token = $token;
        }

        function setLevel($level)
        {
            $this->level = $level;
        }

        function setExpiration_date($expiration_date)
        {
            $this->expiration_date = $expiration_date;
        }

        function setAccess_time($access_time)
        {
            $this->access_time = $access_time;
        }

        function setAccess_ip($access_ip)
        {
            $this->access_ip = $access_ip;
        }

    }

}