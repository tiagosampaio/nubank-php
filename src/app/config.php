<?php

declare(strict_types = 1);

use function \DI\autowire;
use Nubank\Service;

return [
    /** Api Object */
    \Nubank\ApiInterface::class => autowire(\Nubank\Api::class),

    /** Services */
    Service\ConnectionInterface::class => autowire(Service\Connection::class),

    /** Services */
    \GuzzleHttp\ClientInterface::class => autowire(\GuzzleHttp\Client::class),
];
