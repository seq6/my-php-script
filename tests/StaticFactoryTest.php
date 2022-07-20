<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\StaticFactory\ConcreteProductA;
use BasicDesignPattern\Creational\StaticFactory\ConcreteProductB;
use BasicDesignPattern\Creational\StaticFactory\StaticFactory;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * 静态工厂方法
 */
class StaticFactoryTest extends TestCase
{
    public function testCreateProductA()
    {
        $productA = StaticFactory::factory('A');
        $this->assertInstanceOf(ConcreteProductA::class, $productA);
    }

    public function testCreateProductB()
    {
        $productB = StaticFactory::factory('B');
        $this->assertInstanceOf(ConcreteProductB::class, $productB);
    }

    public function testInvalidParam()
    {
        try {
            StaticFactory::factory('error');
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidArgumentException::class, $e);
        }
    }
}
