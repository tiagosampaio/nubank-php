<?php

declare(strict_types = 1);

namespace Nubank;

/**
 * Interface ApiInterface
 *
 * @package Nubank
 */
interface ApiInterface
{
    /**
     * @return ConfigPool
     */
    public function config() : ConfigPool;
}
