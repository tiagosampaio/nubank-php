<?php

declare(strict_types = 1);

use function \DI\autowire;

return [
    /** Api Object */
    \Nubank\ApiInterface::class => autowire(\Nubank\Api::class),
];
