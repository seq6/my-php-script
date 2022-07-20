<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Visitor\ConcreteComponentA;
use BasicDesignPattern\Behavioral\Visitor\ConcreteComponentB;
use BasicDesignPattern\Behavioral\Visitor\ConcreteVisitor1;
use BasicDesignPattern\Behavioral\Visitor\ConcreteVisitor2;
use PHPUnit\Framework\TestCase;

/**
 * 访问者模式
 */
class VisitorTest extends TestCase
{
    public function testVisitor()
    {
        $components = [
            new ConcreteComponentA(),
            new ConcreteComponentB()
        ];

        echo "The client code works with all visitors via the base Visitor interface:\n";
        $visitor1 = new ConcreteVisitor1();
        foreach ($components as $c) {
            $c->accept($visitor1);
        }
        echo "\n";

        echo "It allows the same client code to work with different types of visitors:\n";
        $visitor2 = new ConcreteVisitor2();
        foreach ($components as $c) {
            $c->accept($visitor2);
        }

        $this->assertTrue(true);
    }
}
