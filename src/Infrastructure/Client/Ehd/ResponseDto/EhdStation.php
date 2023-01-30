<?php

namespace App\Infrastructure\Client\Ehd\ResponseDto;

class EhdStation
{
    /**
     * @var int
     */
    public int $global_id;

    /**
     * @var string
     */
    public string $stop_name;

    /**
     * @var string
     */
    public string $transport_number;

    /**
     * @var string
     */
    public string $address;

    /**
     * @var string
     */
    public string $Lng;

    /**
     * @var string
     */
    public string $lat;

    /**
     * @var EhdCity
     */
    public EhdCity $city;

    /**
     * @var string
     */
    public string $direction;

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
    public function getStopName(): string
    {
        return $this->stop_name;
    }

    /**
     * @return string
     */
    public function getTransportNumber(): string
    {
        return $this->transport_number;
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
        return $this->Lng;
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
    public function getCity(): EhdCity
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @param int $global_id
     */
    public function setGlobalId(int $global_id): void
    {
        $this->global_id = $global_id;
    }

    /**
     * @param string $stop_name
     */
    public function setStopName(string $stop_name): void
    {
        $this->stop_name = $stop_name;
    }

    /**
     * @param string $transport_number
     */
    public function setTransportNumber(string $transport_number): void
    {
        $this->transport_number = $transport_number;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @param string $Lng
     */
    public function setLng(string $Lng): void
    {
        $this->Lng = $Lng;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @param EhdCity $city
     */
    public function setCity(EhdCity $city): void
    {
        $this->city = $city;
    }

    /**
     * @param string $direction
     */
    public function setDirection(string $direction): void
    {
        $this->direction = $direction;
    }
}