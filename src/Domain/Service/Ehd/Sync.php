<?php

namespace App\Domain\Service\Ehd;

use App\Domain\Repository\Ehd\EhdCityRepositoryInterface;
use App\Domain\Repository\Ehd\EhdStationRepositoryInterface;

class Sync
{
    public function __construct(
        private readonly EhdCityRepositoryInterface $ehdCityRepository,
        private readonly EhdStationRepositoryInterface $ehdStationRepository
    ) {

    }
}