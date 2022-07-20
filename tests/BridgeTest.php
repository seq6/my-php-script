<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Bridge\Abstraction;
use BasicDesignPattern\Structural\Bridge\ConcreteImplementationA;
use BasicDesignPattern\Structural\Bridge\ConcreteImplementationB;
use PHPUnit\Framework\TestCase;

/**
 * 桥接模式
 */
class BridgeTest extends TestCase
{
    public function testBridge()
    {
        $impl = new ConcreteImplementationA();
        $abstra = new Abstraction($impl);
        echo $abstra->operation() . "\n";

        $impl = new ConcreteImplementationB();
        $abstra = new Abstraction($impl);
        echo $abstra->operation() . "\n";

        $this->assertTrue(true);
    }
}
