<?php

namespace litepubl\core\logmanager;

interface FactoryInterface
{
    public function getLogManager():LogManagerInterface;
}
