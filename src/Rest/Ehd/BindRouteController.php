<?php

namespace App\Rest\Ehd;

use App\Application\Ehd\Command\Route\Bind\Command;
use St\AbstractService\Controller\CommandController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BindRouteController extends CommandController
{

    #[Route('/route/bind', name: 'api.v1.route.bind')]
    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->handle(new Command());

        return $this->successResponse();
    }
}