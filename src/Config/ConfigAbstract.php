<?php

declare(strict_types = 1);

namespace Nubank\Config;

use Nubank\ConfigPool;

/**
 * Class ConfigAbstract
 *
 * @package Nubank\Config
 */
class ConfigAbstract implements ConfigInterface
{
    /**
     * @var ConfigPool
     */
    protected $configPool;

    /**
     * @param ConfigPool $configPool
     *
     * @return $this
     */
    public function setConfigPool(ConfigPool $configPool)
    {
        $this->configPool = $configPool;
        return $this;
    }
}
