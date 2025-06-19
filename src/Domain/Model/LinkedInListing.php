<?php
namespace jobiq\Domain\Model;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Listing;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

/**
 * Class LinkedInListing
 * Represents a LinkedIn job listing
 */
class LinkedInListing implements Entity, Listing
{
    use Loggable;

    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    public function getDetails(): array
    {
        return [];
    }
}