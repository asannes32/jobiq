<?php

namespace jobiq\Domain\Factory;

use jobiq\Domain\Model\Resume;
use jobiq\Domain\Interface\Entity;
use jobiq\Domain\Interface\Factory;
use Pimple\Container;

class ResumeFactory implements Factory
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
        $resume = new Resume($this->container['logger']);
        $resume->initialize(
            $this->container->get(ParserFactory::class)
                ->create($details)
                ->parse()
        );

        return $resume;
    }
}