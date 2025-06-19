<?php
namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Client;
use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

/**
 * IndeedClient Class
 *
 * Contains specific logic for connecting to Indeed via api
 */
class IndeedClient implements Entity, Client
{
    use Loggable;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    /**
     * @param array|null $keywords
     * @return array
     */
    public function getListings(array $keywords = null): array
    {
        // search using api
        // todo - create Listing[] to return using ListingFactory
        return [];
    }
}