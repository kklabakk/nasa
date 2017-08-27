<?php

namespace NeoBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;

use NeoBundle\Entity\Neo;

/**
 * Neo Repository
 */
class NeoRepository extends EntityRepository
{
    /**
     * @return mixed
     *
     * @throws NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findAllHazardous()
    {
        $queryBuilder = $this->createQueryBuilder('n');

        $queryBuilder->where('n.isHazardous = true');

        return $queryBuilder->getQuery()->getResult();
    }

    public function referenceExists($reference)
    {
        return $this->createQueryBuilder('n')
            ->select('count(n.id)')
            ->where('n.reference=:reference')
            ->setParameter('reference', $reference)
            ->getQuery()
            ->getSingleScalarResult() == 0;
    }
}