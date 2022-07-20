<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\SimpleFactory\SimpleFactory;
use PHPUnit\Framework\TestCase;

/**
 * 简单工厂模式
 */
class SimpleFactoryTest extends TestCase
{
    public function testSimpleFactory()
    {
        $product = (new SimpleFactory())->create();
        $this->assertInstanceOf(Product::class, $product);
    }
}
