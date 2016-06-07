<?php
/**
 * <b>Client</b>
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
     * @ORM\Table(name="clients")
     */
    class Client
    {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        private $id;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $name;
        /**
         * @ORM\Column(type="string", length=255, unique=true)
         */
        private $email;

        function getId()
        {
            return $this->id;
        }


        function getName()
        {
            return $this->name;
        }


        function getEmail()
        {
            return $this->email;
        }


        function setName($name)
        {
            $this->name = $name;
        }


        function setEmail($email)
        {
            $this->email = $email;
        }


    }
}