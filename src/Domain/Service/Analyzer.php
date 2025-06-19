<?php

namespace jobiq\Domain\Service;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

class Analyzer implements Entity
{
    use Loggable;

    public function __construct(Logger $logger)
    {
        $this->setLogger($logger);
    }

    public function score()
    {

    }
}