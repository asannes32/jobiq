<?php

namespace jobiq\Domain\Trait;

use Monolog\Logger;
use Psr\Log\LogLevel;

trait Loggable
{
    /**
     * @var Logger $logger
     */
    public Logger $logger;

    /**
     * @return Logger
     */
    public function getLogger(): Logger
    {
        return $this->logger;
    }

    /**
     * @param Logger $logger
     * @return void
     */
    public function setLogger(Logger $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function log(string $message, array $context): bool
    {
        return $this->logger->log(LogLevel::INFO, $message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return bool
     */
    public function debug(string $message, array $context): bool
    {
        return $this->logger->log(LogLevel::DEBUG, $message, $context);
    }
}