<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use jobiq\Domain\Service\IndeedClient;
use jobiq\Domain\Service\LinkedInClient;
use Pimple\Container;

/**
 * ClientFactory Class
 *
 * Contains specific logic for obfuscating creation of Client objects
 */
class ClientFactory implements Factory
{
    /**
     * @var Container
     */
    private Container $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $details
     * @return Entity
     */
    public function create(array $details): Entity
    {
        switch ($details['source']) {
            case 'Indeed':
                return $this->container->get(IndeedClient::class);
            case 'LinkedIn':
                return $this->container->get(LinkedInClient::class);
        }
    }
}