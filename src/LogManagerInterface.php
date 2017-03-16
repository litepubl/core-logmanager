<?php

namespace litepubl\core\logmanager;

use Psr\Log\LoggerInterface;

interface LogManagerInterface
{
    public function getLogger():LoggerInterface;
    public function logException(\Throwable $e, array $context = []);
    public function trace(string $message, array $context = []);
}
