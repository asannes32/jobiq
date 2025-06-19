<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;
use SplFileInfo;

/**
 * ParserFactory Class
 *
 * Contains specific logic for obfuscating creation of Parser objects
 */
class ParserFactory implements Factory
{
    /**
     * @var Container
     */
    private Container $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $details
     * @return Entity
     */
    public function create(array $details): Entity
    {
        $info = new SplFileInfo($details['path']);

        switch ($info->getExtension()) {
            case 'pdf':
                return $this->container['PdfParser']->setPath($details['path']);
            case 'doc':
            case 'docx':
                return $this->container['WordParser']->setPath($details['path']);
        }
    }
}