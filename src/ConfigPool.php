<?php

declare(strict_types = 1);

namespace Nubank;

/**
 * Class ConfigPool
 *
 * @package Nubank
 */
class ConfigPool
{
    /**
     * @var Config\Discovery
     */
    protected $discovery;

    /**
     * @var Config\Service
     */
    private $service;

    /**
     * @var Config\Credentials
     */
    private $credentials;

    public function __construct(
        Config\Credentials $credentials,
        Config\Service $service,
        Config\Discovery $discovery
    ) {
        $this->credentials = $credentials;
        $this->service = $service;
        $this->discovery = $discovery;
    }

    /**
     * @return Config\Discovery
     */
    public function discovery() : Config\Discovery
    {
        $this->discovery->setConfigPool($this);
        return $this->discovery;
    }

    /**
     * @return Config\Service
     */
    public function service() : Config\Service
    {
        $this->service->setConfigPool($this);
        return $this->service;
    }

    /**
     * @return Config\Credentials
     */
    public function credentials() : Config\Credentials
    {
        $this->credentials->setConfigPool($this);
        return $this->credentials;
    }
}
