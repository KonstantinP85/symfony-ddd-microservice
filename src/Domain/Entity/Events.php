<?php

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\EventTypeEnum;
use Doctrine\ORM\Mapping as ORM;

class Events
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private int $id;

    /**
     * @ORM\Column(
     *     name="event_type",
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Тип события"}
     *     )
     */
    private string $eventType;

    /**
     * @ORM\Column(
     *     name="entity",
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Сущность"}
     *     )
     */
    private string $entity;

    /**
     * @param EventTypeEnum $eventType
     * @param string $entity
     */
    public function __construct(EventTypeEnum $eventType, string $entity)
    {
        $this->eventType = $eventType->value;
        $this->entity = $entity;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }
}