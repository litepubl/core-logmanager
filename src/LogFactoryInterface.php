<?php

namespace litepubl\core\LogFactory;

use Psr\Log\LoggerInterface;

interface LogFactoryInterface
{
    public function getLogger():LoggerInterface;
    public function logException(\Throwable $e, array $context = []);
}
