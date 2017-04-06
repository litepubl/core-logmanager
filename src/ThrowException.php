<?php

namespace litepubl\core\logmanager;

class ThrowException implements LogManagerInterface
{
    public function logException(\Throwable $e, array $context = [])
    {
        throw $e;
    }

    public function error(string $message, int $code = 0)
    {
        throw new \RuntimeException($message, $code);
    }
}
