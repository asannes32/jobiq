<?php
namespace jobiq\Domain\Model;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Trait\Loggable;
use Monolog\Logger;

class Resume implements Entity
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