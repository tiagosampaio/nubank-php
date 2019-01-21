<?php

declare(strict_types = 1);

namespace Nubank\Framework\Object;

/**
 * Class FactoryAbstract
 *
 * @package Nubank\Framework\Object
 */
abstract class FactoryAbstract implements FactoryInterface
{
    /**
     * @var string
     */
    protected $objectClass = null;

    /**
     * @var \Nubank\Framework\ObjectManager
     */
    private $objectManager;

    /**
     * FactoryAbstract constructor.
     * @param \Nubank\Framework\ObjectManager $objectManager
     */
    public function __construct(
        \Nubank\Framework\ObjectManager $objectManager
    ) {
        $this->objectManager = $objectManager;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function create(array $parameters = [])
    {
        try {
            /** @var mixed $instance */
            $instance = $this->objectManager->create($this->objectClass, $parameters);
        } catch (\Exception $e) {
            /** @todo debug error or throw exception. */
            return false;
        }

        return $instance;
    }
}
