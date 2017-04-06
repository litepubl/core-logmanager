<?php

namespace litepubl\core\logmanager;

interface LogManagerInterface
{
    public function logException(\Throwable $e, array $context = []);
    public function error(string $message, int $code = 0);
    public function trace(string $message, array $context = []);
}
