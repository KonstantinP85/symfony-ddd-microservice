<?php

namespace App\Infrastructure\Repository\Ehd;

use App\Domain\Entity\Ehd\EhdRoute;
use App\Domain\Repository\Ehd\EhdRouteRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query\QueryException;
use Doctrine\Persistence\ManagerRegistry;

class EhdRouteRepository extends ServiceEntityRepository implements EhdRouteRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EhdRoute::class);
    }

    /**
     * @param EhdRoute ...$routes
     */
    public function add(EhdRoute ...$routes): void
    {
        foreach ($routes as $route) {
            $this->getEntityManager()->persist($route);
        }

        $this->save();
    }

    public function save(): void
    {
        $this->getEntityManager()->flush();
    }

    public function findOneByParam(array $param): ?EhdRoute
    {
        return $this->findOneBy($param);
    }

    /**
     * @return EhdRoute[]
     */
    public function findList(): array
    {
        $qb = $this->createQueryBuilder('r');

        $qb->where($qb->expr()->eq('r.isDeleted', 0));

        return $qb->getQuery()->getResult();
    }

    /**
     * @param Criteria $criteria
     * @return array|EhdRoute[]
     * @throws QueryException
     */
    public function findListByFilter(Criteria $criteria): array
    {
        $qb = $this->createQueryBuilder('r');

        $qb->addCriteria($criteria);

        return $qb->getQuery()->getResult();
    }
}