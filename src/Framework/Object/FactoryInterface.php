<?php

declare(strict_types = 1);

namespace Nubank\Framework\Object;

/**
 * Interface FactoryInterface
 *
 * @package Nubank\Framework\Object
 */
interface FactoryInterface
{
    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = []);
}
