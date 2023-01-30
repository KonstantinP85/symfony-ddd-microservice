<?php

namespace App\Infrastructure\Client;

use App\Domain\Entity\Connection\Ehd;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdCity;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdRoute;
use App\Infrastructure\Client\Ehd\ResponseDto\EhdStation;
use App\Infrastructure\Client\Enum\HttpMethodEnum;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use St\AbstractService\Converter\Converter;
use St\AbstractService\Converter\FormatEnum;
use St\AbstractService\Serializer\CommonSerializer;
use St\AbstractService\Validator\Validator;

class EhdClient
{
    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * @var Converter
     */
    private Converter $converter;

    /**
     * @var CommonSerializer
     */
    private CommonSerializer $serializer;

    /**
     * @param Ehd $ehdProfile
     */
    public function __construct(
        private readonly Ehd $ehdProfile
    ) {
        $this->httpClient = new Client();
        $this->serializer = new CommonSerializer();
        $this->converter = new Converter($this->serializer, new Validator());
    }

    /**
     * @return array|object
     * @throws \Exception
     */
    public function getCities(): array|object
    {
        $response = $this->sendRequest(
            HttpMethodEnum::POST,
            $this->ehdProfile->getDictionaryAction(),
            [],
            ['id' => $this->ehdProfile->getCityDictionaryId()],
            $this->ehdProfile->getHeaders()
        );
        return $this->converter->convertResponseToDto($response['response'], EhdCity::class);
    }

    /**
     * @return array|object
     * @throws \Exception
     */
    public function getStations(): array|object
    {
        $response = $this->sendRequest(
            HttpMethodEnum::POST,
            $this->ehdProfile->getCatalogAction(),
            [],
            ['id' => $this->ehdProfile->getStationCatalogId()],
            $this->ehdProfile->getHeaders()
        );
        $result = $response['response'];
        array_walk($result, function(&$item) {
            if (array_key_exists(0, $item['mo'])) {
                $item['city'] = $item['mo'][0];
            }
        });
        return $this->converter->convertResponseToDto(array_filter($result, function ($item) {
            if (empty($item['city'])) {
                return false;
            }
            return true;
        }), EhdStation::class);
    }

    /**
     * @return array|object
     * @throws \Exception
     */
    public function getRoutes(): array|object
    {
        $response = $this->sendRequest(
            HttpMethodEnum::POST,
            $this->ehdProfile->getCatalogAction(),
            [],
            ['id' => $this->ehdProfile->getRouteCatalogId()],
            $this->ehdProfile->getHeaders()
        );
        return $this->converter->convertResponseToDto($response['response'], EhdRoute::class);
    }

    private function sendRequest(
        HttpMethodEnum $httpMethod,
        string $action,
        array $queryParams = [],
        array|object $requestBody = [],
        array $header = []
    ): array {

        $options = [];
        if (!empty($requestBody)) {
            $options['json'] = $requestBody;
        }

        if (!empty($queryParams)) {
            $options['query'] = $queryParams;
        }

        if (!empty($header)) {
            $options['headers'] = $header;
        }

        try {

            $response = $this->httpClient->request($httpMethod->value, $this->ehdProfile->getUrl() . $action, $options);

        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $body = $response->getBody()->getContents();

        return $this->serializer->decode($body, FormatEnum::JSON_FORMAT->value);
    }
}