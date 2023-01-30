<?php

namespace App\Infrastructure\Repository\Ehd;

use App\Domain\Entity\Ehd\EhdCity;
use App\Domain\Repository\Ehd\EhdCityRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EhdCityRepository extends ServiceEntityRepository implements EhdCityRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EhdCity::class);
    }

    /**
     * @param EhdCity ...$cities
     */
    public function add(EhdCity ...$cities): void
    {
        foreach ($cities as $city) {
            $this->getEntityManager()->persist($city);
        }

        $this->save();
    }

    public function save(): void
    {
        $this->getEntityManager()->flush();
    }

    public function findOneByParam(array $param): ?EhdCity
    {
        return $this->findOneBy($param);
    }

    /**
     * @return EhdCity[]
     */
    public function findList(): array
    {
        $qb = $this->createQueryBuilder('c');

        $qb->where($qb->expr()->eq('c.isDeleted', 0));

        return $qb->getQuery()->getResult();
    }
}