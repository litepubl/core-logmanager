<?php

namespace litepubl\core\logmanager;

use Psr\Log\LoggerInterface;

class LazyProxy implements LogManagerInterface
{
    protected $manager;
    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    protected function getManager(): LogManagerInterface
    {
        if (!$this->manager) {
                $this->manager = call_user_func_array($this->callback, [LogManagerInterface::class]);
            $this->callback = null;
        }

        return $this->manager;
    }

    public function getLogger():LoggerInterface
    {
        return $this->getManager()->getLogger();
    }

    public function logException(\Throwable $e, array $context = [])
    {
        return $this->getManager()->logException($e, $context);
    }

    public function trace(string $message, array $context = [])
    {
        return $this->getManager()->trace($message, $context);
    }
}
