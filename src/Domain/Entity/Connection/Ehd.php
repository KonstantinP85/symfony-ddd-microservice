<?php

namespace App\Domain\Entity\Connection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Ehd extends BaseProfile
{
    /**
     * @return string
     */
    public function getDictionaryAction(): string
    {
        return $this->getAdditionalInfo()['dictionary_action'];
    }

    /**
     * @return string
     */
    public function getCatalogAction(): string
    {
        return $this->getAdditionalInfo()['catalog_action'];
    }

    /**
     * @return int
     */
    public function getCityDictionaryId(): int
    {
        return $this->getAdditionalInfo()['city_dictionary_id'];
    }

    /**
     * @return int
     */
    public function getStationCatalogId(): int
    {
        return $this->getAdditionalInfo()['station_catalog_id'];
    }

    /**
     * @return int
     */
    public function getRouteCatalogId(): int
    {
        return $this->getAdditionalInfo()['route_catalog_id'];
    }
}