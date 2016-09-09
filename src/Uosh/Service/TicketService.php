<?php
/**
 * <b>TicketService</b>
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

namespace Uosh\Service
{

    use Uosh\Entity\Ticket as TicketEntity;
    use Doctrine\ORM\EntityManager;

    class TicketService
    {

        const EntityTicketPath = 'Uosh\Entity\Ticket';

        protected $Ticket;
        protected $limit = null;
        protected $status = null;
        private $EntityManeger;

        function __construct(EntityManager $EntityManager)
        {
            $this->EntityManeger = $EntityManager;
        }

        public function setLimit($limit)
        {
            $this->limit = $limit;
            return $this;
        }

        public function setStatus($status)
        {
            $this->status = $status;
            return $this;
        }

        public function getTickets()
        {
            $limit = (empty($this->limit) ? 10000 : $this->limit);

            if ($this->status == null):
                $query = $this->EntityManeger->createQueryBuilder()
                        ->select('t', 'u', 'c')
                        ->from(self::EntityTicketPath, 't')
                        ->setMaxResults($limit)
                        ->join('t.user', 'u')
                        ->join('u.company', 'c')
                        ->getQuery();
            else :
                $query = $this->EntityManeger->createQueryBuilder()
                        ->select('t', 'u', 'c')
                        ->from(self::EntityTicketPath, 't')
                        ->leftJoin('t.user', 'u')
                        ->leftJoin('u.company', 'c')
                        ->where("t.status = :status")
                        ->setMaxResults($limit)
                        ->setParameter("status", $this->status)
                        ->getQuery();
            endif;
            $tickets = \Umbrella\Helper::extractArray($query->getArrayResult());
            if (!empty($tickets)):
                return $tickets;
            endif;

            return false;
        }

        public function getMyTickets($current_user)
        {
            
        }

        public function getTicketsByStatus($status = null)
        {
            
        }

        protected function verifyStatus($status)
        {
            switch ($status):
                case 'opened' :
                case 'waitting':
                case 'closed' :
                case 'inprogress' : return true;
            endswitch;
            return false;
        }

    }

}