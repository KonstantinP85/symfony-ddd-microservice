<?php

namespace App\Domain\Repository\Ehd;


use App\Domain\Entity\Ehd\EhdRoute;
use Doctrine\Common\Collections\Criteria;

interface EhdRouteRepositoryInterface
{
    /**
     * @param EhdRoute...$route
     */
    public function add(EhdRoute ...$route): void;

    public function save(): void;

    /**
     * @return EhdRoute[]
     */
    public function findList(): array;

    /**
     * @param array $param
     * @return EhdRoute|null
     */
    public function findOneByParam(array $param): ?EhdRoute;

    /**
     * @return EhdRoute[]
     */
    public function findListByFilter(Criteria $criteria): array;
}