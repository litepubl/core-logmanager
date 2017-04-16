<?php

namespace litepubl\core\logmanager;

use Psr\Log\LoggerInterface;

interface LogManagerInterface
{
    public function getLogger():LoggerInterface;
    public function logException(\Throwable $e, array $context = []);
    public function error(string $message, int $code = 0);
    public function trace(string $message = '', array $context = []);
    public function getHtmlLog(): string;
}
