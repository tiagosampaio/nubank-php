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
    private $configPool;

    /**
     * @var Service\ConnectionInterface
     */
    private $connection;

    public function __construct(
        Service\ConnectionInterface $connection,
        ConfigPool $configPool,
        string $userId,
        string $password
    ) {
        $this->connection = $connection;
        $this->configPool = $configPool;

        $this->configPool
            ->credentials()
            ->setUserId($userId)
            ->setPassword($password);
    }

    /**
     * @return ConfigPool
     */
    public function config() : ConfigPool
    {
        return $this->configPool;
    }
}
