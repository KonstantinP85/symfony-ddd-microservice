<?php

namespace App\Application\Ehd\Query\Route\DTO;

class RouteResponse
{
    public int $routeId;

    public ?int $transportCount;

    public string $routeNumber;

    public string $name;

    public ?string $directStopName;

    public ?string $backStopName;

    public string $organizationName;

    public ?int $nsiRouteId;

    public ?int $nsiOrganizationId;

    public ?int $nsiPartnerId;
}