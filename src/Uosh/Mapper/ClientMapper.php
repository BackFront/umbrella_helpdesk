<?php
/**
 * <h1>ClientMapper</h1>
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
namespace Uosh\Mapper;
use Uosh\Entity\Client;

class ClientMapper
{

    protected $Client;
    private $DB;

    function __construct($dbInstance)
    {
        $this->DB = $dbInstance;
    }


    /**
     * Insere/cadastra um cliente no banco
     * 
     * @param Client $client - Objeto do tipo Cliente com os dados do cliente
     * @return int $id - Retorna o ID do cliente caso ele seja cadastrado no banco de dados
     */
    public function insert(Client $client)
    {
        $this->Client = $client;
        return $this->DB->QRInsert('users', $client->getClient())->getResult();
    }


    /**
     * Busca um cliente no banco pelo Id
     * 
     * @param type $id - Id do cliente
     * @return object - retorna um objeto com as informações do cliente
     */
    public function getClientById($id)
    {
        return;
    }


}