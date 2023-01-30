<?php

namespace App\Domain\Repository\Ehd;

use App\Domain\Entity\Ehd\EhdCity;

interface EhdCityRepositoryInterface
{
    /**
     * @param EhdCity ...$cities
     */
    public function add(EhdCity ...$cities): void;

    public function save(): void;

    /**
     * @return EhdCity[]
     */
    public function findList(): array;

    /**
     * @param array $param
     * @return EhdCity|null
     */
    public function findOneByParam(array $param): ?EhdCity;
}