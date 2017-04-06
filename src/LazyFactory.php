<?php

namespace litepubl\core\logmanager;

class LazyFactory implements FactoryInterface
{
    protected $manager;
    protected $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function getLogManager(): LogManagerInterface
    {
        if (!$this->manager) {
                $this->manager = call_user_func_array($this->callback, [LogManagerInterface::class]);
            $this->callback = null;
        }

        return $this->manager;
    }
}
