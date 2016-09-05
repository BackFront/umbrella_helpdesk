<?php
/**
 * <b>Ticket</b>
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
     * @ORM\Table(name="tickets")
     */
    class Ticket
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
         * @ORM\Column(type="string", length=32)
         */
        private $hash;
        //----------------------------------------------------------------------
        /**
         * @ORM\ManyToOne(targetEntity="Uosh\Entity\User")
         * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
         */
        private $user;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="string", length=15)
         */
        private $priority;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="datetime")
         */
        private $creation_date;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="integer")
         */
        private $message_count;
        //----------------------------------------------------------------------
        /**
         * @ORM\Column(type="string", length=15)
         */
        private $status;

        //----------------------------------------------------------------------
        // ===== GETTERS
        //----------------------------------------------------------------------
        function getId()
        {
            return $this->id;
        }

        function getHash()
        {
            return $this->hash;
        }

        function getUser()
        {
            return $this->user;
        }

        function getPriority()
        {
            return $this->priority;
        }

        function getCreation_date()
        {
            return $this->creation_date;
        }

        function getMessage_count()
        {
            return $this->message_count;
        }

        function getStatus()
        {
            return $this->status;
        }

        //----------------------------------------------------------------------
        // ===== SETTERS
        //----------------------------------------------------------------------
        function setHash($hash)
        {
            $this->hash = $hash;
        }

        function setUser($user)
        {
            $this->user = $user;
        }

        function setPriority($priority)
        {
            $this->priority = $priority;
        }

        function setCreation_date($creation_date)
        {
            $this->creation_date = $creation_date;
        }

        function setMessage_count($message_count)
        {
            $this->message_count = $message_count;
        }

        function setStatus($status)
        {
            $this->status = $status;
        }

    
    }

}