<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\FileReader;
use jobiq\Domain\Trait\Loggable;
use jobiq\Domain\Trait\Readable;
use Monolog\Logger;

class WordReader implements Entity, FileReader
{
    use Loggable, Readable;

    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    public function read(): array
    {
        $path = $this->getPath();

        return [
            'Name' => 'Andrew Sannes',
            'Title' => 'Senior Software Engineer'
        ];
    }
}