<?php

namespace App\Domain\Service\Ehd;

use App\Domain\Entity\Ehd\EhdCity;
use App\Domain\Entity\Ehd\EhdRoute;
use App\Domain\Entity\Ehd\EhdStation;
use App\Domain\Repository\Ehd\EhdCityRepositoryInterface;
use App\Domain\Repository\Ehd\EhdRouteRepositoryInterface;
use App\Domain\Repository\Ehd\EhdStationRepositoryInterface;

class Import
{
    public function __construct(
        private readonly EhdCityRepositoryInterface $ehdCityRepository,
        private readonly EhdStationRepositoryInterface $ehdStationRepository,
        private readonly EhdRouteRepositoryInterface $ehdRouteRepository
    ) {

    }

    /**
     * @param EhdCity ...$ehdImportedCities
     */
    public function importCity(EhdCity ...$ehdImportedCities): void
    {
        $ehdImportedCityIds = array_map(fn($item) => $item->getCityId(), $ehdImportedCities);

        $savedEhdCity = $this->ehdCityRepository->findList();
        $savedEhdCityIds = array_map(fn($item) => $item->getCityId(), $savedEhdCity);

        foreach ($savedEhdCity as $savedCity) {
            if (!in_array($savedCity->getCityId(), $ehdImportedCityIds)) {
                $removeCity = $this->ehdCityRepository->findOneByParam(['cityId' => $savedCity->getCityId()]);
                $removeCity->setIsDeleted(true);
            }
        }

        $forAdd = [];
        foreach ($ehdImportedCities as $importedCity) {
            if (!in_array($importedCity->getCityId(), $savedEhdCityIds)) {
                $forAdd[] = $importedCity;
            } else {
                $updateCity = $this->ehdCityRepository->findOneByParam(['cityId' => $importedCity->getCityId()]);

                if ($updateCity instanceof EhdCity) $updateCity->setName($importedCity->getName());
            }
        }

        $this->ehdCityRepository->add(...$forAdd);
    }

    /**
     * @param EhdStation ...$ehdImportedStations
     */
    public function importStation(EhdStation ...$ehdImportedStations): void
    {
        $ehdImportedStationIds = array_map(fn($item) => $item->getStationId(), $ehdImportedStations);

        $savedEhdStation = $this->ehdStationRepository->findList();
        $savedEhdStationIds = array_map(fn($item) => $item->getStationId(), $savedEhdStation);

        foreach ($savedEhdStation as $savedStation) {
            if (!in_array($savedStation->getStationId(), $ehdImportedStationIds)) {
                $removeStation = $this->ehdStationRepository->findOneByParam(['stationId' => $savedStation->getStationId()]);
                $removeStation->setIsDeleted(true);
            }
        }

        $forAdd = [];
        foreach ($ehdImportedStations as $importedStation) {
            if (!in_array($importedStation->getStationId(), $savedEhdStationIds)) {
                $forAdd[] = $importedStation;
            } else {
                $updateStation = $this->ehdStationRepository->findOneByParam(['stationId' => $importedStation->getStationId()]);

                if ($updateStation instanceof EhdStation) {
                    $updateStation->setName($importedStation->getName());
                    $updateStation->setTransportNumber($importedStation->getTransportNumber());
                    $updateStation->setAddress($importedStation->getAddress());
                    $updateStation->setLat($importedStation->getLat());
                    $updateStation->setLng($importedStation->getLng());
                }
            }
        }

        $this->ehdStationRepository->add(...$forAdd);
    }

    /**
     * @param EhdRoute ...$ehdImportedRoutes
     */
    public function importRoute(EhdRoute ...$ehdImportedRoutes): void
    {
        $ehdImportedRouteIds = array_map(fn($item) => $item->getRouteId(), $ehdImportedRoutes);

        $savedEhdRoute = $this->ehdRouteRepository->findList();
        $savedEhdRouteIds = array_map(fn($item) => $item->getRouteId(), $savedEhdRoute);

        foreach ($savedEhdRoute as $savedRoute) {
            if (!in_array($savedRoute->getRouteId(), $ehdImportedRouteIds)) {
                $removeRoute = $this->ehdRouteRepository->findOneByParam(['routeId' => $savedRoute->getRouteId()]);
                $removeRoute->setIsDeleted(true);
            }
        }

        $forAdd = [];
        foreach ($ehdImportedRoutes as $importedRoute) {
            if (!in_array($importedRoute->getRouteId(), $savedEhdRouteIds)) {
                $forAdd[] = $importedRoute;
            } else {
                $updateRoute = $this->ehdRouteRepository->findOneByParam(['routeId' => $importedRoute->getRouteId()]);

                if ($importedRoute instanceof EhdRoute) {
                    $updateRoute->setName($importedRoute->getName());
                    $updateRoute->setRouteNumber($importedRoute->getRouteNumber());
                    $updateRoute->setDirectStopName($importedRoute->getDirectStopName());
                    $updateRoute->setBackStopName($importedRoute->getBackStopName());
                    $updateRoute->setOrganizationName($importedRoute->getOrganizationName());
                    $updateRoute->setTransportCount($importedRoute->getTransportCount());
                }
            }
        }

        $this->ehdRouteRepository->add(...$forAdd);
    }
}