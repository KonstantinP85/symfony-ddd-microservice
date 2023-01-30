<?php

namespace App\Domain\Repository\Ehd;

use App\Domain\Entity\Ehd\EhdStation;

interface EhdStationRepositoryInterface
{
    /**
     * @param EhdStation ...$stations
     */
    public function add(EhdStation ...$stations): void;

    public function save(): void;

    /**
     * @return EhdStation[]
     */
    public function findList(): array;

    /**
     * @param array $param
     * @return EhdStation|null
     */
    public function findOneByParam(array $param): ?EhdStation;
}