<?php

namespace litepubl\tests\logmanager;

use litepubl\core\logmanager\LogManagerInterface;
use litepubl\core\logmanager\LazyProxy;
use Psr\Log\LoggerInterface;

class LogManagerTest extends \Codeception\Test\Unit
{
    protected $tester;

    public function testMe()
    {
        $manager = $this->prophesize(LogManagerInterface::class);
        $proxy = new LazyProxy(
            function () use ($manager) {
                return $manager->reveal();
            }
        );

        $this->assertInstanceOf(LogManagerInterface::class, $proxy);
        $manager->trace('mesg', ['k' => 'v'])->shouldBeCalled();
        $proxy->trace('mesg', ['k' => 'v']);

        try {
                throw new \RuntimeException('some');
        } catch (\Throwable $e) {
                $manager->logException($e, ['i' => 'j'])->shouldBeCalled();
                $proxy->logException($e, ['i' => 'j']);
        }

        $manager->getLogger()->willReturn($this->prophesize(LoggerInterface::class)->reveal());
        $proxy->getLogger();
    }
}
