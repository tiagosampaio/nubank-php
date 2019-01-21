<?php

declare(strict_types = 1);

namespace Nubank\Service;

use Nubank\Framework\Object\FactoryAbstract;

/**
 * Class ClientFactory
 *
 * @package Nubank\Service
 */
class ClientFactory extends FactoryAbstract
{
    /**
     * @var string
     */
    protected $objectClass = \GuzzleHttp\ClientInterface::class;
}
