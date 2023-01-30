<?php

namespace App\Rest\Ehd;

use App\Application\Ehd\Command\Station\Sync\Command;
use St\AbstractService\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SyncStationController extends CommandController
{
    #[Route('/city/sync', name: 'api.v1.city.sync')]
    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->handle(new Command());

        return $this->successResponse();
    }
}