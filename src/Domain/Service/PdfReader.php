<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\FileReader;
use jobiq\Domain\Trait\Loggable;
use jobiq\Domain\Trait\Readable;
use Monolog\Logger;

class PdfReader implements Entity, FileReader
{
    use Loggable, Readable;

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
    public function readFile(): array
    {
        $path = $this->getPath();

        return [
            'Name' => 'Andrew Sannes',
            'Title' => 'Senior Software Engineer'
        ];
    }
}