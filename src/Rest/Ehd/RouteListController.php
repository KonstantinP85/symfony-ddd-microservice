<?php

namespace App\Rest\Ehd;

use App\Application\Ehd\Query\Route\List\Query;
use St\AbstractService\Controller\QueryController;
use St\AbstractService\Exception\BadRequestParamsException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RouteListController extends QueryController
{
    #[Route('/route/list', name: 'api.v1.route.list')]
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $query = $this->getConverter()->convertRequestToDto(Query::class, $request);

        } catch (\Exception $e) {
            if ($e instanceof BadRequestParamsException) {
                return $this->badParamsResponse($e->getMessage());
            }
            return $this->errorResponse($e->getMessage());
        }

        $routeList = $this->queryBus->query($query);

        return $this->successResponse($routeList);
    }
}