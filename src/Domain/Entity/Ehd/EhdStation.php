<?php

namespace App\Domain\Entity\Ehd;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class EhdStation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private int $id;

    /**
     * @ORM\Column(
     *     name="station_id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в ЕХД"}
     *     )
     */
    private int $stationId;

    /**
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     length=512,
     *     nullable=false,
     *     options={"comment":"Название станции"}
     *     )
     */
    private string $name;

    /**
     * @ORM\Column(
     *     name="transport_number",
     *     type="string",
     *     length=512,
     *     nullable=false,
     *     options={"comment":"Номера останавливающихся транспортных средств через точку с запятой"}
     *     )
     */
    private string $transportNumber;

    /**
     * @ORM\Column(
     *     name="address",
     *     type="string",
     *     length=512,
     *     nullable=false,
     *     options={"comment":"Адрес"}
     *     )
     */
    private string $address;

    /**
     * @ORM\Column(
     *     name="lng",
     *     type="string",
     *     length=128,
     *     nullable=false,
     *     options={"comment":"Долгота"}
     *     )
     */
    private string $lng;

    /**
     * @ORM\Column(
     *     name="lat",
     *     type="string",
     *     length=128,
     *     nullable=false,
     *     options={"comment":"Широта"}
     *     )
     */
    private string $lat;

    /**
     * @ORM\ManyToOne(targetEntity="EhdCity")
     * @ORM\JoinColumn(name="ehd_city_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private EhdCity $ehdCity;

    /**
     * @ORM\Column(
     *     name="nsi_station_id",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в НСИ"}
     *     )
     */
    private ?int $nsiStationId;

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
     * @param string $name
     * @param int $stationId
     * @param string $transportNumber
     * @param string $address
     * @param string $lng
     * @param string $lat
     * @param EhdCity $ehdCity
     * @param int|null $nsiStationId
     * @param bool $isDeleted
     */
    public function __construct(
        string $name,
        int $stationId,
        string $transportNumber,
        string $address,
        string $lng,
        string $lat,
        EhdCity $ehdCity,
        ?int $nsiStationId = null,
        ?bool $isDeleted = false,
    ) {
        $this->name = $name;
        $this->stationId = $stationId;
        $this->transportNumber = $transportNumber;
        $this->address = $address;
        $this->lng = $lng;
        $this->lat = $lat;
        $this->ehdCity = $ehdCity;
        $this->nsiStationId = $nsiStationId;
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
    public function getStationId(): int
    {
        return $this->stationId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTransportNumber(): string
    {
        return $this->transportNumber;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @return EhdCity
     */
    public function getEhdCity(): EhdCity
    {
        return $this->ehdCity;
    }

    /**
     * @return int|null
     */
    public function getNsiStationId(): ?int
    {
        return $this->nsiStationId;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param int $stationId
     */
    public function setStationId(int $stationId): void
    {
        $this->stationId = $stationId;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $transportNumber
     */
    public function setTransportNumber(string $transportNumber): void
    {
        $this->transportNumber = $transportNumber;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @param string $lng
     */
    public function setLng(string $lng): void
    {
        $this->lng = $lng;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @param EhdCity $ehdCity
     */
    public function setEhdCity(EhdCity $ehdCity): void
    {
        $this->ehdCity = $ehdCity;
    }

    /**
     * @param int|null $nsiStationId
     */
    public function setNsiStationId(?int $nsiStationId): void
    {
        $this->nsiStationId = $nsiStationId;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}