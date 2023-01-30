<?php

namespace App\Infrastructure\Repository\Connection;

use App\Domain\Entity\Connection\BaseProfile;
use App\Domain\Repository\Connection\ProfileRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

class ProfileRepository extends ServiceEntityRepository implements ProfileRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaseProfile::class);
    }

    /**
     * @param string $profile
     * @return BaseProfile|null
     * @throws NonUniqueResultException
     */
    public function findByProfile(string $profile): ?BaseProfile
    {
        $qb = $this->createQueryBuilder('p');

        $qb->where($qb->expr()->isInstanceOf('p', $profile))
           ->andWhere($qb->expr()->eq('p.isActive', true));

        return $qb->getQuery()->getOneOrNullResult();
    }
}