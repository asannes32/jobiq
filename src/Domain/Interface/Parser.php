<?php

namespace jobiq\Domain\Interface;

interface Parser
{
    public function getPath(): string;
    public function setPath(string $path): Parser;
    public function parse(): array;
}