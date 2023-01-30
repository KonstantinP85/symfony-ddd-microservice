<?php

namespace App\Application\Ehd\Command\Route\Import;

use App\Domain\Entity\Connection\Ehd;
use App\Domain\Entity\Ehd\EhdRoute;
use App\Domain\Service\Ehd\Import;
use App\Infrastructure\Client\EhdClient;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdRoute as EhdResponseDto;
use App\Infrastructure\Repository\Connection\ProfileRepository;
use Doctrine\ORM\NonUniqueResultException;
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
     * @throws NonUniqueResultException
     */
    public function __invoke(Command $command): void
    {
        $profile = $this->profileRepository->findByProfile(Ehd::class);

        /** @var Ehd $profile */
        $ehdClient = new EhdClient($profile);

        $arrayRoutes = $ehdClient->getRoutes();

        $arr = [];
        /** @var EhdResponseDto $route */
        foreach ($arrayRoutes as $route) {

            $ehdRoute = new EhdRoute(
                $route->getGlobalId(),
                $route->getRouteNumber(),
                $route->getFULLNAME(),
                $route->getNameDirectStop(),
                $route->getNameBackStop(),
                $route->getOrgName(),
                $route->getNumberTr()
            );
            $arr[] = $ehdRoute;
        }

        $this->domainServiceImport->importRoute(...$arr);
    }
}