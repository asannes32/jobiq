<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Model\IndeedListing;
use jobiq\Domain\Model\LinkedInListing;
use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;

class ListingFactory implements Factory
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
                return new IndeedListing($this->container['logger']);
            case 'LinkedIn':
                return new LinkedInListing($this->container['logger']);
        }
    }
}