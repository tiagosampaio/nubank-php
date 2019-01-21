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
     * @var Config\Credentials
     */
    private $credentials;

    public function __construct(
        Config\Credentials $credentials
    ) {
        $this->credentials = $credentials;
    }

    /**
     * @return Config\Credentials
     */
    public function credentials()
    {
        return $this->credentials;
    }
}
