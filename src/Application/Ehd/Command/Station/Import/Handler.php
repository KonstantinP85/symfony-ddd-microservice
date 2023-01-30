<?php

namespace App\Application\Ehd\Command\Station\Import;

use App\Domain\Entity\Connection\Ehd;
use App\Domain\Entity\Ehd\EhdCity;
use App\Domain\Entity\Ehd\EhdStation;
use App\Domain\Service\Ehd\Import;
use App\Infrastructure\Client\EhdClient;
use App\Infrastructure\Repository\Connection\ProfileRepository;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdStation as EhdResponseDto;
use App\Infrastructure\Repository\Ehd\EhdCityRepository;
use Doctrine\ORM\NonUniqueResultException;
use St\AbstractService\Bus\Command\CommandHandlerInterface;

class Handler implements CommandHandlerInterface
{
    public function __construct(
        private readonly ProfileRepository $profileRepository,
        private readonly EhdCityRepository $ehdCityRepository,
        private readonly Import $domainServiceImport
    ) {
    }

    /**
     * @param Command $command
     * @throws NonUniqueResultException
     */
    public function __invoke(Command $command): void
    {
        $profile = $this->profileRepository->findByProfile(Ehd::class);

        /** @var Ehd $profile */
        $ehdClient = new EhdClient($profile);

        $arrayStations = $ehdClient->getStations();
        $arrForSave = [];
        /** @var EhdResponseDto $station */
        foreach ($arrayStations as $station) {
            $city = $this->ehdCityRepository->findOneByParam(['cityId' => $station->getCity()->getKey()]);
            if ($city instanceof EhdCity) {

                $name = $station->getStopName();
                $direction = $station->getDirection()??"";
                $direction = $direction!="" ? ' (' . $direction . ')' : $direction;
                $name = mb_substr($name . $direction, 0, 253);

                $ehdStation = new EhdStation(
                    $name,
                    $station->getGlobalId(),
                    $station->getTransportNumber(),
                    $station->getAddress(),
                    $station->getLng(),
                    $station->getLat(),
                    $city
                );
                $arrForSave[] = $ehdStation;
            }
        }

        $this->domainServiceImport->importStation(...$arrForSave);
    }
}