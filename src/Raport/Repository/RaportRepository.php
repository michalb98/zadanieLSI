<?php

namespace App\Raport\Repository;

use Doctrine\ORM\EntityRepository;
use DateTime;

class RaportRepository extends EntityRepository{

    public function getByDateAndPlace(DateTime $od, DateTime $do, $lokal){
        $query = $this->createQueryBuilder('r')
                ->addSelect('u')
                ->leftJoin('r.userraport', "u")
                ->where('(r.created > :od AND r.created < :do) AND lokal == :lokal')
                ->setParameter('od', $od->format('Y-m-d'))
                ->setParameter('do', $do->format('Y-m-d'))
                ->setParameter('lokal', $lokal)
                ->getQuery();
        return $query->getResult();
    }
}