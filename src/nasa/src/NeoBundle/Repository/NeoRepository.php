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

    /**
     * @return mixed
     */
    public function findFastest(bool $isHazardous = false)
    {
        return $this->createQueryBuilder('n')
            ->where('n.isHazardous=:isHazardous')
            ->setParameter('isHazardous', $isHazardous)
            ->orderBy('n.speed', 'desc')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @return bool
     */
    public function referenceExists(int $reference)
    {
        return $this->createQueryBuilder('n')
            ->select('count(n.id)')
            ->where('n.reference=:reference')
            ->setParameter('reference', $reference)
            ->getQuery()
            ->getSingleScalarResult() == 0;
    }
}