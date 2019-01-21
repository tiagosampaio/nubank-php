<?php

declare(strict_types = 1);

namespace Nubank;

/**
 * Class Api
 *
 * @package Nubank
 */
class Api implements ApiInterface
{
    /**
     * @var ConfigPool
     */
    protected $configPool;

    public function __construct(
        ConfigPool $configPool,
        string $userId,
        string $password
    ) {
        $this->configPool = $configPool;

        $this->configPool
            ->credentials()
            ->setUserId($userId)
            ->setPassword($password);
    }

    /**
     * @return ConfigPool
     */
    public function config()
    {
        return $this->configPool;
    }
}
