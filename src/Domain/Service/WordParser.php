<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Parser;
use jobiq\Domain\Trait\Loggable;
use jobiq\Domain\Trait\Parsable;
use Monolog\Logger;

/**
 * WordParser Class
 *
 * Contains specific logic for parsing a Word doc
 */
class WordParser implements Entity, Parser
{
    use Loggable, Parsable;

    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    public function parse(): array
    {
        $path = $this->getPath();

        return [
            'Name' => 'Andrew Sannes',
            'Title' => 'Senior Software Engineer'
        ];
    }
}