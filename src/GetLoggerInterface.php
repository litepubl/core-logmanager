<?php

namespace litepubl\core\loginterfaces;

use Psr\Log\LoggerInterface;

interface GetLoggerInterface
{
    public function getLogger():LoggerInterface;
}
