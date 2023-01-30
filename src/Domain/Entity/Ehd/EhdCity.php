<?php

namespace App\Domain\Entity\Ehd;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class EhdCity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private ?int $id = null;

    /**
     * @ORM\Column(
     *     name="city_id",
     *     type="integer",
     *     nullable=false,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в ЕХД"}
     *     )
     */
    private int $cityId;

    /**
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Название города"}
     *     )
     */
    private string $name;

    /**
     * @ORM\Column(
     *     name="nsi_city_id",
     *     type="integer",
     *     nullable=true,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в НСИ"}
     *     )
     */
    private ?int $nsiCityId;

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
     * @param int $cityId
     * @param int|null $nsiCityId
     * @param bool $isDeleted
     */
    public function __construct(
        string $name,
        int $cityId,
        ?int $nsiCityId = null,
        ?bool $isDeleted = false,
    ) {
        $this->name = $name;
        $this->cityId = $cityId;
        $this->nsiCityId = $nsiCityId;
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
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int|null
     */
    public function getNsiCityId(): ?int
    {
        return $this->nsiCityId;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    /**
     * @param int $cityId
     */
    public function setCityId(int $cityId): void
    {
        $this->cityId = $cityId;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int|null $nsiCityId
     */
    public function setNsiCityId(?int $nsiCityId): void
    {
        $this->nsiCityId = $nsiCityId;
    }

    /**
     * @param bool $isDeleted
     */
    public function setIsDeleted(bool $isDeleted): void
    {
        $this->isDeleted = $isDeleted;
    }
}