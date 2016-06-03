<?php
/**
 * <b>ClientService</b>
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
namespace Uosh\Service;
class ClientService
{

    protected $Client;
    protected $ClientMapper;

    function __construct(Client $client, ClientMapper $clientMapper)
    {
        $this->Client = $client;
        $this->ClientMapper = $clientMapper;
    }


    /**
     * Registra um cliente no banco de dados
     * 
     * @param array $client - array com os dados do cliente a ser criado
     */
    public function register(array $datas)
    {
        $this->Client->setClient($datas);
        return $this->ClientMapper->insert($this->Client);
    }


}