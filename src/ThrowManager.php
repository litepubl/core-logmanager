<?php

namespace litepubl\core\logmanager;

class ThrowManager implements LogManagerInterface
{
    private $exceptionClass;

    public function __construct(string $exceptionClass = \RuntimeException::class)
    {
        $this->exceptionClass = $exceptionClass;
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
}
