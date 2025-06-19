<?php
namespace jobiq\Domain\Interface;

/**
 * Interface Listing
 * Represents an abstract job listing contract
 */
interface Listing
{
    public function getDetails(): array;
}