<?php

namespace litepubl\core\logmanager;

class NullManager implements LogManagerInterface
{
    public function logException(\Throwable $e, array $context = [])
    {
    }

    public function error(string $message, int $code = 0)
    {
    }
}
