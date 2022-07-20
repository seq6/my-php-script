<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\Prototype\ComponentWithBackReference;
use BasicDesignPattern\Creational\Prototype\Prototype;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * 原型模式
 */
class PrototypeTest extends TestCase
{
    public function testPrototype()
    {
        $p1 = new Prototype();
        $p1->primitive = 1;
        $p1->component = new DateTime();
        $p1->circularReference = new ComponentWithBackReference($p1);
        $p2 = clone $p1;

        $this->assertTrue($p1->primitive === $p2->primitive);
        $this->assertTrue($p1->component !== $p2->component);
        $this->assertTrue($p1->circularReference !== $p2->circularReference);
        $this->assertTrue($p1->circularReference->prototype !== $p2->circularReference->prototype);
    }
}
