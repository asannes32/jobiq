<?php
namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Client;
use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

/**
 * LinkedInClient Class
 *
 * Contains specific logic for connecting to Indeed via api
 */
class LinkedInClient implements Entity, Client
{
    use Loggable;

    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    public function getListings(array $keywords = null): array
    {
        // search using api
        // todo - create Listing[] to return using ListingFactory
        return [];
    }
}