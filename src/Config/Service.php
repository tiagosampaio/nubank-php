<?php

declare(strict_types = 1);

namespace Nubank\Config;

use Nubank\Model\UriBuilder;

/**
 * Class Service
 *
 * @package Nubank\Config
 */
class Service extends ConfigAbstract
{
    /**
     * @var UriBuilder
     */
    private $uriBuilder;

    /**
     * This is the base URL for Nubank services. Goes from s0 to s6 instance.
     *
     * @var string
     */
    private $host = 'prod-s0-webapp-proxy.nubank.com.br';

    public function __construct(
        UriBuilder $uriBuilder
    ) {
        $this->uriBuilder = $uriBuilder;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return (string) $this->host;
    }
}
