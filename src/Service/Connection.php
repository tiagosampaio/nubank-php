<?php

declare(strict_types = 1);

namespace Nubank\Service;

use Nubank\ConfigPool;

/**
 * Class Connection
 *
 * @package Nubank\Service
 */
class Connection implements ConnectionInterface
{
    /**
     * @var ClientFactory
     */
    protected $clientFactory;

    /**
     * @var ConfigPool
     */
    protected $configPool;

    public function __construct(
        ClientFactory $clientFactory,
        ConfigPool $configPool
    ) {
        $this->clientFactory = $clientFactory;
        $this->configPool = $configPool;
    }

    /**
     * @inheritdoc
     */
    public function post($resourcePath, array $data = [], array $config = [])
    {
        // TODO: Implement post() method.
    }

    /**
     * @inheritdoc
     */
    public function get($resourcePath, array $data = [], array $config = [])
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritdoc
     */
    public function request($method, $resourcePath, array $data = [], array $config = [])
    {
        // TODO: Implement request() method.
    }

    /**
     * @return \GuzzleHttp\Client
     */
    private function client()
    {
        return $this->clientFactory->create();
    }
}
