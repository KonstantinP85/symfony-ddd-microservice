<?php

namespace App\Infrastructure\Repository\Ehd;

use App\Domain\Entity\Ehd\EhdStation;
use App\Domain\Repository\Ehd\EhdStationRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EhdStationRepository extends ServiceEntityRepository implements EhdStationRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EhdStation::class);
    }

    /**
     * @param EhdStation ...$stations
     */
    public function add(EhdStation ...$stations): void
    {
        foreach ($stations as $station) {
            $this->getEntityManager()->persist($station);
        }

        $this->save();
    }

    public function save(): void
    {
        $this->getEntityManager()->flush();
    }

    public function findOneByParam(array $param): ?EhdStation
    {
        return $this->findOneBy($param);
    }

    /**
     * @return EhdStation[]
     */
    public function findList(): array
    {
        $qb = $this->createQueryBuilder('s');

        $qb->where($qb->expr()->eq('s.isDeleted', 0));

        return $qb->getQuery()->getResult();
    }
}