<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\AbstractFactory\ConcreteFactory1;
use BasicDesignPattern\Creational\AbstractFactory\ConcreteFactory2;
use BasicDesignPattern\Creational\AbstractFactory\ConcreteProductA1;
use BasicDesignPattern\Creational\AbstractFactory\ConcreteProductA2;
use BasicDesignPattern\Creational\AbstractFactory\ConcreteProductB1;
use BasicDesignPattern\Creational\AbstractFactory\ConcreteProductB2;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * 抽象工厂模式
 */
class FactoryMethodTest extends TestCase
{
    public function testCreate1()
    {
        $c1 = new ConcreteFactory1();
        $productA = $c1->createProductA();
        $this->assertInstanceOf(ConcreteProductA1::class, $productA);
        $productB = $c1->createProductB();
        $this->assertInstanceOf(ConcreteProductB1::class, $productB);
    }

    public function testCreate2()
    {
        $c2 = new ConcreteFactory2();
        $productA = $c2->createProductA();
        $this->assertInstanceOf(ConcreteProductA2::class, $productA);
        $productB = $c2->createProductB();
        $this->assertInstanceOf(ConcreteProductB2::class, $productB);
    }
}
