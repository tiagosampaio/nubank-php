<?php

declare(strict_types = 1);

namespace Nubank\Service;

/**
 * Class ClientBuilder
 *
 * @package Nubank\Service
 */
class ClientBuilder
{
    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    public function __construct(
        ClientFactory $clientFactory
    ) {
        $this->clientFactory = $clientFactory;
    }

    /**
     * @param array $parameters
     *
     * @return \GuzzleHttp\ClientInterface
     */
    public function build(array $parameters = [])
    {
        /** @var \GuzzleHttp\ClientInterface $client */
        $client = $this->clientFactory->create($parameters);
        return $client;
    }
}
