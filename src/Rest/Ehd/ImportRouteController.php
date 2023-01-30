<?php

namespace App\Rest\Ehd;

use App\Application\Ehd\Command\Route\Import\Command;
use St\AbstractService\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImportRouteController extends CommandController
{
    #[Route('/route/import', name: 'api.v1.route.import')]
    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->handle(new Command());

        return $this->successResponse();
    }
}