<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Strategy\Context;
use BasicDesignPattern\Behavioral\Strategy\ConcreteStrategyA;
use BasicDesignPattern\Behavioral\Strategy\ConcreteStrategyB;
use PHPUnit\Framework\TestCase;

/**
 * 策略模式
 */
class StrategyTest extends TestCase
{
    public function testStrategy()
    {
        $context = new Context(new ConcreteStrategyA());
        echo "Client: Strategy is set to normal sorting.\n";
        $context->doSomeBusinessLogin();

        echo "\n";

        echo "Client: Strategy is set to reverse sorting.\n";
        $context->setStrategy(new ConcreteStrategyB());
        $context->doSomeBusinessLogin();

        $this->assertTrue(true);
    }
}
