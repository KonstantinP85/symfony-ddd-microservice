<?php

namespace App\Domain\Entity\Ehd;

use Doctrine\ORM\Mapping as ORM;

class EhdOrganization
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private int $id;

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
     *     nullable=false,
     *     options={"unsigned":true, "comment":"Уникальный идентификатор в НСИ"}
     *     )
     */
    private int $nsiCityId;

    /**
     * @ORM\Column(
     *     name="is_deleted",
     *     type="boolean",
     *     nullable=false,
     *     options={"comment":"Активен или нет"}
     *     )
     */
    private bool $isDeleted;

    /**
     * @param string $name
     * @param int $cityId
     * @param int $nsiCityId
     * @param bool $isDeleted
     */
    public function __construct(
        string $name,
        int $cityId,
        int $nsiCityId,
        ?bool $isDeleted = false,
    ) {
        $this->name = $name;
        $this->cityId = $cityId;
        $this->nsiCityId = $nsiCityId;
        $this->isDeleted = $isDeleted;
    }
}