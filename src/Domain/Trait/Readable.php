<?php

namespace jobiq\Domain\Trait;

use jobiq\Domain\Interface\FileReader;

trait Readable
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
     * @return FileReader
     */
    public function setPath(string $path): FileReader
    {
        $this->path = $path;
        return $this;
    }
}