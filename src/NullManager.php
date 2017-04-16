<?php

namespace litepubl\core\logmanager;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class NullManager implements LogManagerInterface
{
    private $logger;

    public function __construct()
    {
        $this->logger = new NullLogger();
    }

    public function getLogger():LoggerInterface
    {
        return $this->logger;
    }

    public function logException(\Throwable $e, array $context = [])
    {
    }

    public function error(string $message, int $code = 0)
    {
    }

    public function trace(string $message = '', array $context = [])
    {
    }

    public function getHtmlLog(): string
    {
        return '';
    }
}
