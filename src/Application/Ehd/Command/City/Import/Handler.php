<?php

namespace App\Application\Ehd\Command\City\Import;

use App\Domain\Entity\Connection\Ehd;
use App\Domain\Entity\Ehd\EhdCity;
use App\Domain\Service\Ehd\Import;
use App\Infrastructure\Client\EhdClient;
use App\Infrastructure\Repository\Connection\ProfileRepository;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdCity as EhdResponseDto;
use St\AbstractService\Bus\Command\CommandHandlerInterface;

class Handler implements CommandHandlerInterface
{
    public function __construct(
        private readonly ProfileRepository $profileRepository,
        private readonly Import $domainServiceImport
    ) {
    }

    /**
     * @param Command $command
     * @throws \Exception
     */
    public function __invoke(Command $command): void
    {
        $profile = $this->profileRepository->findByProfile(Ehd::class);

        /** @var Ehd $profile */
        $ehdClient = new EhdClient($profile);

        $arrayCities = $ehdClient->getCities();

        $arr = [];
        /** @var EhdResponseDto $city */
        foreach ($arrayCities as $city) {
            $ehdCity = new EhdCity(
                $city->getValue(),
                $city->getKey()
            );

            $arr[] = $ehdCity;
        }

        $this->domainServiceImport->importCity(...$arr);
    }
}