<?php
// Here you can initialize variables that will be available to your tests
use Codeception\Util\Autoload;

Autoload::addNamespace('litepubl\tests\logmanager', __DIR__);
Autoload::addNamespace('litepubl\core\logmanager', __DIR__ . '/../../src');
