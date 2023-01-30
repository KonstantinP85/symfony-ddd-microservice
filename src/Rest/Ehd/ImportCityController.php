<?php

namespace App\Rest\Ehd;

use App\Application\Ehd\Command\City\Import\Command;
use St\AbstractService\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ImportCityController extends CommandController
{
    #[Route('/city/import', name: 'api.v1.city.import')]
    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->handle(new Command());

        return $this->successResponse();
    }
}