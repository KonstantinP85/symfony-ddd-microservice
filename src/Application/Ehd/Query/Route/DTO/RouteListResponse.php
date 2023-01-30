<?php

namespace App\Application\Ehd\Query\Route\DTO;

class RouteListResponse
{
    /**
     * @var RouteResponse[]
     */
    public array $routeResponseList;

    public function __construct(RouteResponse ...$routeResponseList)
    {
        $this->routeResponseList = $routeResponseList;
    }
}