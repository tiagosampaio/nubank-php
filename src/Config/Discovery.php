<?php

declare(strict_types = 1);

namespace Nubank\Config;

use Nubank\ConfigPool;
use Nubank\Model\UriBuilder;
use Nubank\Service\ClientBuilder;

/**
 * Class Discovery
 *
 * @package Nubank\Config
 */
class Discovery extends ConfigAbstract
{
    /**
     * @var ClientBuilder
     */
    protected $clientBuilder;

    /**
     * @var UriBuilder
     */
    protected $uriBuilder;

    /**
     * @var array
     */
    private $serviceUris = [];

    public function __construct(
        ClientBuilder $clientBuilder,
        UriBuilder $uriBuilder
    ) {
        $this->clientBuilder = $clientBuilder;
        $this->uriBuilder = $uriBuilder;
    }

    /**
     * @return string
     */
    public function loginUrl()
    {
        $this->discovery();
        return $this->serviceUris['login'];
    }

    /**
     * @return string
     */
    private function getDiscoveryPath()
    {
        return '/api/discovery';
    }

    /**
     * @return $this
     */
    private function discovery()
    {
        if (!empty($this->serviceUris)) {
            return $this;
        }

        /** @var \GuzzleHttp\Client $client */
        $client = $this->clientBuilder->build();
        $uri = $this->uriBuilder->build(
            $this->configPool->service()->getHost(),
            $this->getDiscoveryPath()
        );

        $headers = [
            'Content-type' => 'application/json',
            'Accept'       => 'application/json',
        ];

        /** @var \GuzzleHttp\Psr7\Response $response */
        $response = $client->get($uri, [
            'headers' => $headers
        ]);

        $this->serviceUris = (array) json_decode((string) $response->getBody(), true);

        return $this;
    }
}
