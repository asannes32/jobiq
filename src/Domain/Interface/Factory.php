<?php

namespace jobiq\Domain\Interface;

interface Factory
{
    public function create(array $details): Entity;
}