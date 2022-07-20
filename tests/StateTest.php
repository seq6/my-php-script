<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\State\ConcreteStateA;
use BasicDesignPattern\Behavioral\State\Context;
use PHPUnit\Framework\TestCase;

/**
 * 状态模式
 */
class StateTest extends TestCase
{
    public function testState()
    {
        $context = new Context(new ConcreteStateA());
        $context->request1();
        $context->request2();
        $this->assertTrue(true);
    }
}
