<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Parser;
use jobiq\Domain\Trait\Loggable;
use jobiq\Domain\Trait\Parsable;
use Monolog\Logger;

/**
 * PdfParser Class
 *
 * Contains specific logic for parsing a PDF
 */
class PdfParser implements Entity, Parser
{
    use Loggable, Parsable;

    /**
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    /**
     * @return string[]
     */
    public function parse(): array
    {
        $path = $this->getPath();

        return [
            'Name' => 'Andrew Sannes',
            'Title' => 'Senior Software Engineer'
        ];
    }
}