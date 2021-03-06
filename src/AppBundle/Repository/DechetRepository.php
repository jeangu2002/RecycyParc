<?php

namespace AppBundle\Repository;

/**
 * DechetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DechetRepository extends \Doctrine\ORM\EntityRepository
{
    public function getForDropdown()
    {
        return $this->getEntityManager()->createQuery(
                'SELECT d.id, d.nom FROM AppBundle:Dechet d')
                ->getArrayResult();
    }
    
    public function add($dechet) {
         $this->getEntityManager()->persist($dechet);
         $this->getEntityManager()->flush();
    }
    
    public function getAll() {
        return $this->getEntityManager()->createQuery(
                'SELECT d FROM AppBundle:Dechet d')
                ->getResult();
    }
    
}
