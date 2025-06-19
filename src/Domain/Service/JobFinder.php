<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Factory\ClientFactory;
use Pimple\Container;

/**
 * JobFinder Class
 *
 * Contains specific logic for searching job posts and returning an array of Listing objects
 */
class JobFinder
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
     * @param array $keywords
     * @return array
     */
    public function search(array $keywords): array
    {
        return array_merge(
            $this->container->get(ClientFactory::class)->create(['source' => 'LinkedIn'])->getListings($keywords),
            $this->container->get(ClientFactory::class)->create(['source' => 'Indeed'])->getListings($keywords)
        );
    }
}