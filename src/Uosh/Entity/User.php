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
     * @ORM\Table(name="users")
     */
    class User
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
        /**
         * @ORM\Column(type="string", length=100)
         */
        private $alias;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $description;
        /**
         * @ORM\Column(type="string", length=50)
         */
        private $password;
        /**
         * @ORM\Column(type="integer")
         */
        private $level;
        /**
         * @ORM\ManyToOne(targetEntity="Uosh\Entity\Company")
         * @ORM\JoinColumn(name="id_company", referencedColumnName="id")
         */
        private $company;

        //----------------------------------------------------------------------
        // ===== GETTERS
        //----------------------------------------------------------------------
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


        function getAlias()
        {
            return $this->alias;
        }


        function getDescription()
        {
            return $this->description;
        }


        function getPassword()
        {
            return $this->password;
        }


        function getLevel()
        {
            return $this->level;
        }


        //----------------------------------------------------------------------
        // ===== SETTERS
        //----------------------------------------------------------------------

        function getCompany()
        {
            return $this->company;
        }


        function setName($name)
        {
            $this->name = $name;
        }


        function setEmail($email)
        {
            $this->email = $email;
        }


        function setAlias($alias)
        {
            $this->alias = $alias;
        }


        function setDescription($description)
        {
            $this->description = $description;
        }


        function setPassword($password)
        {
            $this->password = $password;
        }


        function setLevel($level)
        {
            $this->level = $level;
        }


        function setCompany($company)
        {
            $this->company = $company;
        }


    }
}