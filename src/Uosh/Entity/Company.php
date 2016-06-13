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
     * @ORM\Table(name="company")
     */
    class Company
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
         * @ORM\Column(type="string", length=255)
         */
        private $endereco;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $cnpj;
        /**
         * @ORM\Column(type="string", length=255)
         */
        private $description;
        /**
         * @ORM\Column(type="decimal", precision=10, scale=2)
         */
        private $budget;

        function getId()
        {
            return $this->id;
        }


        function getName()
        {
            return $this->name;
        }


        function getEndereco()
        {
            return $this->endereco;
        }


        function getCnpj()
        {
            return $this->cnpj;
        }


        function getDescription()
        {
            return $this->description;
        }


        function getBudget()
        {
            return $this->budget;
        }


        function getEmail()
        {
            return $this->email;
        }


        function setEndereco($endereco)
        {
            $this->endereco = $endereco;
        }


        function setCnpj($cnpj)
        {
            $this->cnpj = $cnpj;
        }


        function setDescription($description)
        {
            $this->description = $description;
        }


        function setBudget($budget)
        {
            $this->budget = $budget;
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