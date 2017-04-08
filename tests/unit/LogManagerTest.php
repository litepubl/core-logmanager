<?php

namespace litepubl\tests\logmanager;

use litepubl\core\logmanager\LogManagerInterface;
use litepubl\core\logmanager\NullManager;
use litepubl\core\logmanager\ThrowManager;
use litepubl\core\logmanager\FactoryInterface;
use litepubl\core\logmanager\LazyFactory;

class LogManagerTest extends \Codeception\Test\Unit
{
    protected $v = 'value';
    protected $a = ['k' => 'v'];
    protected $c = 123;

    public function testMe()
    {
        $manager = $this->prophesize(LogManagerInterface::class);
        $factory = new LazyFactory(
            function () use ($manager) {
                return $manager->reveal();
            }
        );

        $this->assertInstanceOf(FactoryInterface::class, $factory);
        $this->assertInstanceOf(LogManagerInterface::class, $factory->getLogManager());

        //        $manager->getLogger()->willReturn($this->prophesize(LoggerInterface::class)->reveal());
        //        $factory->getLogManager();

        $manager->error($this->v, $this->c)->shouldBeCalled();
        $factory->getLogManager()->error($this->v, $this->c);

        try {
                throw new \RuntimeException('some');
        } catch (\Throwable $e) {
                $manager->logException($e, $this->a)->shouldBeCalled();
                $factory->getLogManager()->logException($e, $this->a);
        }
    }

    public function testNullManager()
    {
        $manager = new NullManager();
        $this->assertInstanceOf(LogManagerInterface::class, $manager);
        $this->assertInstanceOf(NullManager::class, $manager);
    }

    public function testThrow()
    {
        $this->expectException(\InvalidArgumentException::class);
        $manager = new ThrowManager(\InvalidArgumentException::class);
        $this->assertInstanceOf(LogManagerInterface::class, $manager);
        $manager->error('some');
    }

    public function testThrowException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $manager = new ThrowManager(\InvalidArgumentException::class);
        $this->assertInstanceOf(LogManagerInterface::class, $manager);

        try {
                throw new \InvalidArgumentException();
        } catch (\Throwable $e) {
                $manager->logException($e, $this->a);
        }
    }
}
