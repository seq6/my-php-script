<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Flyweight\FlyweightFactory;
use PHPUnit\Framework\TestCase;

/**
 * 享元模式
 */
class FlyweightTest extends TestCase
{
    public function testFlyweight()
    {
        $factory = new FlyweightFactory([
            ['Chevrolet', 'Camaro2018', 'pink'],
            ['Mercedes Benz', 'C300', 'black'],
            ['Mercedes Benz', 'C500', 'red'],
            ['BMW', 'M5', 'red'],
            ['BMW', 'X6', 'white'],
        ]);
        $factory->listFlyweights();

        $flyweight = $factory->getFlyweight(['CL234IR', 'James Doe', 'BMW']);
        $flyweight->operation(['M5', 'red']);

        $flyweight = $factory->getFlyweight(['CL234IR', 'James Doe', 'BMW']);
        $flyweight->operation(['X1', 'red']);

        $factory->listFlyweights();

        $this->assertTrue(true);
    }
}
