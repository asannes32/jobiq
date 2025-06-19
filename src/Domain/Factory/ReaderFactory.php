<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;
use SplFileInfo;

class ReaderFactory implements Factory
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function create(array $details): Entity
    {
        $info = new SplFileInfo($details['path']);

        switch ($info->getExtension()) {
            case 'pdf':
                return $this->container['PdfReader']->setPath($details['path']);
            case 'doc':
            case 'docx':
                return $this->container['WordReader']->setPath($details['path']);
        }
    }
}