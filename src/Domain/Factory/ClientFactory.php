<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;

class ClientFactory implements Factory
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function create(array $details): Entity
    {
        switch ($details['source']) {
            case 'Indeed':
                return $this->container['IndeedClient'];
            case 'LinkedIn':
                return $this->container['LinkedInClient'];
        }
    }
}