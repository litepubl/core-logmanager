<?php

namespace litepubl\core\logmanager;

use Psr\Log\LoggerInterface;

class ThrowManager implements LogManagerInterface
{
    private $logger;
    private $exceptionClass;

    public function __construct(LoggerInterface $logger, string $exceptionClass = \RuntimeException::class)
    {
        $this->logger = $logger;
        $this->exceptionClass = $exceptionClass;
    }

    public function getLogger():LoggerInterface
    {
        return $this->logger;
    }

    public function logException(\Throwable $e, array $context = [])
    {
        throw $e;
    }

    public function error(string $message, int $code = 0)
    {
        $exceptionClass = $this->exceptionClass;
        throw new $exceptionClass($message, $code);
    }

    public function trace(string $message = '', array $context = [])
    {
        $this->error($message);
    }

    public function getHtmlLog(): string
    {
        return '';
    }
}
