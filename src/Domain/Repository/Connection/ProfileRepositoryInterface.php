<?php

namespace App\Domain\Repository\Connection;

use App\Domain\Entity\Connection\BaseProfile;

interface ProfileRepositoryInterface
{
    /**
     * @param string $profile
     * @return BaseProfile|null
     */
    public function findByProfile(string $profile): ?BaseProfile;
}