<?php

declare(strict_types = 1);

namespace Nubank;

use Nubank\Framework\DI\ContainerRepository;

/**
 * Class ApiFactory
 *
 * @package Nubank
 */
class ApiFactory
{
    /**
     * @var \DI\Container
     */
    private static $container;

    /**
     * @var array
     */
    private static $diConfig = [
        'definitions' => NUBANK_DIR_DI_CONFIG
    ];

    /**
     * @var array
     */
    private static $customDiConfig = [];

    /**
     * @param string $token
     * @param string $password
     * @param array  $diConfig
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    public static function create(string $userId, string $password, array $diConfig = [])
    {
        if (!empty($diConfig)) {
            /** If there's a customized configuration the application can load it. */
            self::$customDiConfig = (array) $diConfig;
        }

        self::setupContainer();

        $api = self::createApiInstance($userId, $password);

        self::$container->set(Api::class, $api);

        return $api;
    }

    /**
     * @param string $userId
     * @param string $password
     *
     * @return ApiInterface
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private static function createApiInstance(string $userId, string $password)
    {
        return self::$container->make(ApiInterface::class, [
            'userId' => $userId,
            'password' => $password,
        ]);
    }

    /**
     * Setup the container.
     *
     * @throws \Frenet\Framework\Exception\ExceptionInterface
     */
    private static function setupContainer()
    {
        self::$container = ContainerRepository::getInstance(self::getDiConfig());
    }

    /**
     * @return array
     */
    private static function getDiConfig()
    {
        $diConfig = array_merge_recursive(self::$diConfig, self::$customDiConfig);
        return $diConfig;
    }
}
