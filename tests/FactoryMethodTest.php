<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\FactoryMethod\ConcreteCreator1;
use BasicDesignPattern\Creational\FactoryMethod\ConcreteCreator2;
use BasicDesignPattern\Creational\FactoryMethod\ConcreteProduct1;
use BasicDesignPattern\Creational\FactoryMethod\ConcreteProduct2;
use PHPUnit\Framework\TestCase;

/**
 * 工厂模式
 */
class FactoryMethodTest extends TestCase
{
    public function testCreateProduct1()
    {
        $p1 = (new ConcreteCreator1())->factoryMethod();
        $this->assertInstanceOf(ConcreteProduct1::class, $p1);
    }

    public function testCreateProduct2()
    {
        $p2 = (new ConcreteCreator2())->factoryMethod();
        $this->assertInstanceOf(ConcreteProduct2::class, $p2);
    }
}
