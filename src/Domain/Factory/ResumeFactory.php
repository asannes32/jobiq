<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Model\Resume;
use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;

class ResumeFactory implements Factory
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function create(array $details): Entity
    {
        return new Resume($this->container['logger']);
    }
}