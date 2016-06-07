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
namespace Uosh\Service {

    use Uosh\Entity\Client as ClientEntity;
    use Doctrine\ORM\EntityManager;

    class ClientService
    {

        const EntityPath = 'Uosh\Entity\Client';

        protected $Client;
        protected $ClientMapper;
        private $EntityManeger;

        public function __construct(EntityManager $EntityManeger)
        {
            $this->EntityManeger = $EntityManeger;
        }


        /**
         * Registra um cliente no banco de dados
         * @param array $client - array com os dados do cliente a ser criado
         */
        public function insert(array $datas)
        {
            $clientEntity = new ClientEntity;
            $clientEntity->setName($datas['name']);
            $clientEntity->setEmail($datas['email']);

            $this->EntityManeger->persist($clientEntity);
            $this->EntityManeger->flush();

            return $clientEntity;
        }


        /**
         * Altera um cliente no banco de dados
         * @param type $id id do cliente a ser alterado
         * @param array $datas dados alterados
         */
        public function update($id, array $datas)
        {
            $clientEntity = $this->EntityManeger->getReference(self::EntityPath, $id);
            $clientEntity->setNome($datas['nome']);

            $this->EntityManeger->persist($clientEntity);
            $this->EntityManeger->flush();

            return $clientEntity;
        }


        public function delete($id, array $datas)
        {
            $clientEntity = $this->EntityManeger->getReference(self::EntityPath, $id);

            if($this->EntityManeger->remove($clientEntity))
                return true;
            return false;
        }


        public function find($id)
        {
            $clientEntity = $this->EntityManeger->getRepository(self::EntityPath);
            return $clientEntity->find($id);
        }


    }
}