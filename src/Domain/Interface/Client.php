<?php

namespace jobiq\Domain\Interface;

/**
 * Interface Client
 * Represents an abstract Client contract
 */
interface Client
{
    public function getListings(array $keywords = null): array;
}