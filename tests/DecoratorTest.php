<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Decorator\ConcreteComponent;
use BasicDesignPattern\Structural\Decorator\ConcreteDecoratorA;
use BasicDesignPattern\Structural\Decorator\ConcreteDecoratorB;
use PHPUnit\Framework\TestCase;

/**
 * 装饰模式
 */
class DecoratorTest extends TestCase
{
    public function testDecorator()
    {
        $simple = new ConcreteComponent();
        echo $simple->operation() . "\n";
        $decorator1 = new ConcreteDecoratorA($simple);
        echo $decorator1->operation() . "\n";
        $decorator2 = new ConcreteDecoratorB($decorator1);
        echo $decorator2->operation() . "\n";
        $this->assertTrue(true);
    }
}
