<?php

namespace App\Infrastructure\Client\Ehd\ResponseDto;

class EhdRoute
{
    /**
     * @var int
     */
    public int $global_id;

    /**
     * @var string
     */
    public string $FULL_NAME;

    /**
     * @var string
     */
    public string $name_direct_stop;

    /**
     * @var string
     */
    public string $name_back_stop;

    /**
     * @var string
     */
    public string $org_name;

    /**
     * @var int|null
     */
    public ?int $number_tr;

    /**
     * @var string
     */
    public string $route_number;

    /**
     * @return int
     */
    public function getGlobalId(): int
    {
        return $this->global_id;
    }

    /**
     * @return string
     */
    public function getFULLNAME(): string
    {
        return $this->FULL_NAME;
    }

    /**
     * @return string
     */
    public function getNameDirectStop(): string
    {
        return $this->name_direct_stop;
    }

    /**
     * @return string
     */
    public function getNameBackStop(): string
    {
        return $this->name_back_stop;
    }

    /**
     * @return string
     */
    public function getOrgName(): string
    {
        return $this->org_name;
    }

    /**
     * @return int|null
     */
    public function getNumberTr(): ?int
    {
        return $this->number_tr;
    }

    /**
     * @return string
     */
    public function getRouteNumber(): string
    {
        return $this->route_number;
    }

    /**
     * @param int $global_id
     */
    public function setGlobalId(int $global_id): void
    {
        $this->global_id = $global_id;
    }

    /**
     * @param string $FULL_NAME
     */
    public function setFULLNAME(string $FULL_NAME): void
    {
        $this->FULL_NAME = $FULL_NAME;
    }

    /**
     * @param string $name_direct_stop
     */
    public function setNameDirectStop(string $name_direct_stop): void
    {
        $this->name_direct_stop = $name_direct_stop;
    }

    /**
     * @param string $name_back_stop
     */
    public function setNameBackStop(string $name_back_stop): void
    {
        $this->name_back_stop = $name_back_stop;
    }

    /**
     * @param string $org_name
     */
    public function setOrgName(string $org_name): void
    {
        $this->org_name = $org_name;
    }

    /**
     * @param int|null $number_tr
     */
    public function setNumberTr(?int $number_tr): void
    {
        $this->number_tr = $number_tr;
    }

    /**
     * @param string $route_number
     */
    public function setRouteNumber(string $route_number): void
    {
        $this->route_number = $route_number;
    }
}