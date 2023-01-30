<?php

namespace App\Application\Ehd\Query\Route\List;

use Attribute;
use St\AbstractService\Bus\Query\QueryInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[Attribute]
class Query implements QueryInterface
{
    #[Assert\Positive]
    public ?int $page;

    #[Assert\Positive]
    public ?int $countPerPage;

    #[Assert\Choice(['name', 'organizationName', 'routeNumber', 'nsiRouteId'])]
    public ?string $sort;


    #[Assert\Choice(['asc', 'desc'])]
    public ?string $order;

    #[Assert\Type('array')]
    public ?array $filters;
}