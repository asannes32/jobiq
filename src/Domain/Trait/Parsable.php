<?php

namespace jobiq\Domain\Trait;

use jobiq\Domain\Interface\Parser;

trait Parsable
{
    /** @var string */
    protected string $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Parser
     */
    public function setPath(string $path): Parser
    {
        $this->path = $path;
        return $this;
    }
}