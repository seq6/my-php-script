<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Mediator\Component1;
use BasicDesignPattern\Behavioral\Mediator\Component2;
use BasicDesignPattern\Behavioral\Mediator\ConcreteMediator;
use PHPUnit\Framework\TestCase;

/**
 * 中介者模式
 */
class MediatorTest extends TestCase
{
    public function testMediator()
    {
        $c1 = new Component1();
        $c2 = new Component2();
        $mediator = new ConcreteMediator($c1, $c2);

        echo "Client triggers operation A.\n";
        $c1->doA();

        echo "\n";
        echo "Client triggers operation D.\n";
        $c2->doD();

        $this->assertTrue(true);
    }
}
