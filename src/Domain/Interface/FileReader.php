<?php

namespace jobiq\Domain\Interface;

interface FileReader
{
    public function getPath(): string;
    public function setPath(string $path): FileReader;
    public function readFile(): array;
}