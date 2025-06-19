<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;

class ReaderFactory implements Factory
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function create(array $details): Entity
    {
        // todo - filetype isn't what we want
        switch (filetype($details['path'])) {
            case 'PDF':
                return $this->container['PdfReader']->setPath($details['path']);
            case 'Word':
                return $this->container['WordReader']->setPath($details['path']);
        }
    }
}