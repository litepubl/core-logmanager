<?php

namespace litepubl\core\LogFactory;

use Psr\Log\LoggerInterface;
use Psr\Container\ContainerInterface;

class LogFactory implements LogFactoryInterface
{
    const LOGGER = 'logger';
    const EXCEPTION_LOGGER = 'exceptionLogger';
    protected $logger;
    protected $container;

    public function __construct(ContainerInterface
        $container
    ) {
    
        $this->container = $container;
    }

    public function getLogger():LoggerInterface
    {
        if (!$this->logger) {
                $this->logger = $this->container->get(static::LOGGER);
        }

        return $this->logger;
    }

    public function logException(\Throwable $e, array $context = [])
    {
        $exceptionLogger = $this->container->get(static::EXCEPTION_LOGGER);
        $log = $exceptionLogger ->getLog($e);

        $logger = $this->getLogger();
        $logger->alert($log, $context);
    }
}
