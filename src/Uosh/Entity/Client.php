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
namespace Uosh\Entity;
class Client
{

    private $id;
    private $name;
    private $email;
    private $adress;

    //GETTERS______________________________________

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


    function getAdress()
    {
        return $this->adress;
    }


    //SETTERS______________________________________
    function setId($id)
    {
        $this->id = $id;
    }


    function setName($name)
    {
        $this->name = $name;
    }


    function setEmail($email)
    {
        $this->email = $email;
    }


    function setAdress($adress)
    {
        $this->adress = $adress;
    }


}