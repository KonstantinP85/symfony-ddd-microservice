<?php

namespace App\Domain\Entity\Ehd;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class EhdRoute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private ?int $id = null;

    /**
     * @ORM\Column(
     *     name="route_id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в ЕХД"}
     *     )
     */
    private int $routeId;

    /**
     * @ORM\Column(
     *     name="transport_count",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Общее количество всех транспортых средств на маршруте"}
     *     )
     */
    private ?int $transportCount;

    /**
     * @ORM\Column(
     *     name="route_number",
     *     type="string",
     *     length=128,
     *     nullable=false,
     *     options={"comment":"Номер муниципального маршрута"}
     *     )
     */
    private string $routeNumber;

    /**
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     length=512,
     *     nullable=false,
     *     options={"comment":"Название маршрута"}
     *     )
     */
    private string $name;

    /**
     * @ORM\Column(
     *     name="direct_stop_name",
     *     type="text",
     *     nullable=true,
     *     options={"comment":"Наименование остановочных пунктов в прямом направлении"}
     *     )
     */
    private ?string $directStopName;

    /**
     * @ORM\Column(
     *     name="back_stop_name",
     *     type="text",
     *     nullable=true,
     *     options={"comment":"Наименование остановочных пунктов в обратном направлении"}
     *     )
     */
    private ?string $backStopName;

    /**
     * @ORM\Column(
     *     name="organization_name",
     *     type="string",
     *     length=512,
     *     nullable=false,
     *     options={"comment":"Название организации"}
     *     )
     */
    private string $organizationName;

    /**
     * @ORM\Column(
     *     name="nsi_route_id",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в НСИ"}
     *     )
     */
    private ?int $nsiRouteId;

    /**
     * @ORM\Column(
     *     name="nsi_organization_id",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор организации в НСИ"}
     *     )
     */
    private ?int $nsiOrganizationId;

    /**
     * @ORM\Column(
     *     name="nsi_partner_id",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор партнера в НСИ"}
     *     )
     */
    private ?int $nsiPartnerId;

    /**
     * @ORM\Column(
     *     name="is_deleted",
     *     type="boolean",
     *     nullable=false,
     *     options={"comment":"Признак удаления"}
     *     )
     */
    private bool $isDeleted;

    /**
     * @param int $routeId
     * @param string $routeNumber
     * @param string $name
     * @param string|null $directStopName
     * @param string|null $backStopName
     * @param string $organizationName
     * @param int|null $transportCount
     * @param int|null $nsiRouteId
     * @param bool $isDeleted
     */
    public function __construct(
        int $routeId,
        string $routeNumber,
        string $name,
        string $directStopName = null,
        string $backStopName = null,
        string $organizationName,
        ?int $transportCount = null,
        ?int $nsiRouteId = null,
        ?int $nsiOrganizationId = null,
        ?int $nsiPartnerId = null,
        ?bool $isDeleted = false,
    ) {
        $this->routeId = $routeId;
        $this->routeNumber = $routeNumber;
        $this->name = $name;
        $this->directStopName = $directStopName;
        $this->backStopName = $backStopName;
        $this->organizationName = $organizationName;
        $this->transportCount = $transportCount;
        $this->nsiRouteId = $nsiRouteId;
        $this->nsiOrganizationId = $nsiOrganizationId;
        $this->nsiPartnerId = $nsiPartnerId;
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRouteId(): int
    {
        return $this->routeId;
    }

    /**
     * @return string
     */
    public function getRouteNumber(): string
    {
        return $this->routeNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDirectStopName(): ?string
    {
        return $this->directStopName;
    }

    /**
     * @return string|null
     */
    public function getBackStopName(): ?string
    {
        return $this->backStopName;
    }

    /**
     * @return string
     */
    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    /**
     * @return int|null
     */
    public function getTransportCount(): ?int
    {
        return $this->transportCount;
    }

    /**
     * @return int|null
     */
    public function getNsiRouteId(): ?int
    {
        return $this->nsiRouteId;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param int $routeId
     */
    public function setRouteId(int $routeId): void
    {
        $this->routeId = $routeId;
    }

    /**
     * @param int|null $transportCount
     */
    public function setTransportCount(?int $transportCount): void
    {
        $this->transportCount = $transportCount;
    }

    /**
     * @param string $routeNumber
     */
    public function setRouteNumber(string $routeNumber): void
    {
        $this->routeNumber = $routeNumber;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $directStopName
     */
    public function setDirectStopName(?string $directStopName): void
    {
        $this->directStopName = $directStopName;
    }

    /**
     * @param string|null $backStopName
     */
    public function setBackStopName(?string $backStopName): void
    {
        $this->backStopName = $backStopName;
    }

    /**
     * @param string $organizationName
     */
    public function setOrganizationName(string $organizationName): void
    {
        $this->organizationName = $organizationName;
    }

    /**
     * @param int|null $nsiRouteId
     */
    public function setNsiRouteId(?int $nsiRouteId): void
    {
        $this->nsiRouteId = $nsiRouteId;
    }

    /**
     * @return int|null
     */
    public function getNsiOrganizationId(): ?int
    {
        return $this->nsiOrganizationId;
    }

    /**
     * @param int|null $nsiOrganizationId
     */
    public function setNsiOrganizationId(?int $nsiOrganizationId): void
    {
        $this->nsiOrganizationId = $nsiOrganizationId;
    }

    /**
     * @return int|null
     */
    public function getNsiPartnerId(): ?int
    {
        return $this->nsiPartnerId;
    }

    /**
     * @param int|null $nsiPartnerId
     */
    public function setNsiPartnerId(?int $nsiPartnerId): void
    {
        $this->nsiPartnerId = $nsiPartnerId;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}