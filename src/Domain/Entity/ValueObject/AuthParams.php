<?php

namespace App\Domain\Entity\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class AuthParams
{
    /**
     * @ORM\Column(
     *     name="login",
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Логин"}
     *     )
     */
    private ?string $login;

    /**
     * @ORM\Column(
     *     name="password",
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Пароль"}
     *     )
     */
    private ?string $password;

    /**
     * @ORM\Column(
     *     name="api_key",
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Апи ключ"}
     *     )
     */
    private ?string $apiKey;

    /**
     * @param string|null $login
     * @param string|null $password
     * @param string|null $apiKey
     */
    public function __construct(?string $login = null, ?string $password = null, ?string $apiKey = null)
    {
        $this->login = $login;
        $this->password = $password;
        $this->apiKey = $apiKey;
    }

    /**
     * @return string|null
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string|null
     */
    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }
}