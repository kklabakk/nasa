<?php

namespace NeoBundle\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\EntityRepository;

use NeoBundle\Entity\Neo;

/**
 * Neo Repository
 */
class UserRepository extends EntityRepository
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

        $queryBuilder->where('u.isHazardous is true');

        return $queryBuilder->getQuery()->getResults();
    }
}