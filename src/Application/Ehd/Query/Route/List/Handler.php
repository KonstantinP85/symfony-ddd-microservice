<?php

namespace App\Application\Ehd\Query\Route\List;

use App\Application\Ehd\Query\Route\DTO\RouteListResponse;
use App\Application\Ehd\Query\Route\DTO\RouteResponse;
use App\Domain\Repository\Ehd\EhdRouteRepositoryInterface;
use St\AbstractService\Bus\Query\QueryHandlerInterface;
use St\AbstractService\Converter\Converter;
use St\AbstractService\Repository\RepositoryEnum;
use St\AbstractService\Repository\SimpleFilter;

class Handler implements QueryHandlerInterface
{
    public function __construct(
        private readonly EhdRouteRepositoryInterface $ehdRouteRepository,
        private readonly Converter $converter
    ) {
    }

    public function __invoke(Query $query): array
    {
        $criteria = (new SimpleFilter(
            RepositoryEnum::EXPRESSION_OR,
            RepositoryEnum::COMPARISON_CONTAINS,
            $query->page, $query->countPerPage,
            $query->filters,
            $query->sort,
            $query->order))->getCriteria();

        $routeResponse = $this->converter->convertEntityToDto(RouteResponse::class, $this->ehdRouteRepository->findListByFilter($criteria));

        return (new RouteListResponse(...$routeResponse))->routeResponseList;
    }
}