<?php

namespace App\Domain\Entity\Connection;

use App\Domain\Entity\ValueObject\AuthParams;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\DiscriminatorColumn(name="type")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\Entity
 * @ORM\DiscriminatorMap({
 *     "ehd" = "Ehd",
 *     "epos" = "Epos",
 * })
 * @ORM\Table(name="integration_profiles",
 *     uniqueConstraints={
 *        @ORM\UniqueConstraint(name="name_unique", columns={"name"})
 *    })
 */
abstract class BaseProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned":true, "comment":"Уникальный идентификатор"})
     */
    private int $id;

    /**
     * @ORM\Column(
     *     name="name",
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Название подключения"}
     *     )
     */
    private string $name;

    /**
     * @ORM\Column(
     *     name="url",
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Базовый URL"}
     *     )
     */
    private string $url;

    /**
     * @ORM\Embedded(class="App\Domain\Entity\ValueObject\AuthParams", columnPrefix="auth_params_")
     */
    private AuthParams $authParams;

    /**
     * @ORM\Column(
     *     name="headers",
     *     type="json",
     *     nullable=true,
     *     options={"comment":"Необходимые заголовки"}
     *     )
     */
    private array $headers;

    /**
     * @ORM\Column(
     *     name="additional_info",
     *     type="json",
     *     nullable=true,
     *     options={"comment":"Дополнительная информация"}
     *     )
     */
    private array $additionalInfo;

    /**
     * @ORM\Column(
     *     name="is_active",
     *     type="boolean",
     *     nullable=false,
     *     options={"comment":"Активен или нет"}
     *     )
     */
    private bool $isActive;

    /**
     * @param string $name
     * @param string $url
     * @param AuthParams $authParams
     * @param array $additionalInfo
     * @param array $headers
     * @param bool $isActive
     */
    public function __construct(
        string $name,
        string $url,
        AuthParams $authParams,
        array $additionalInfo,
        array $headers,
        bool $isActive,
    ) {
        $this->name = $name;
        $this->url = $url;
        $this->authParams = $authParams;
        $this->additionalInfo = $additionalInfo;
        $this->headers = $headers;
        $this->isActive = $isActive;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return AuthParams
     */
    public function getAuthParams(): AuthParams
    {
        return $this->authParams;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getAdditionalInfo(): array
    {
        return $this->additionalInfo;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }
}