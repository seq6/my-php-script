<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\Builder\ConcreteBuilder;
use BasicDesignPattern\Creational\Builder\Director;
use PHPUnit\Framework\TestCase;

/**
 * 生成器模式
 */
class BuilderTest extends TestCase
{
    public function testBuilder()
    {
        $director = new Director();
        $builder = new ConcreteBuilder();
        $director->setBuilder($builder);

        $director->buildMinimalViableProduct();
        echo $builder->getProduct()->listParts();

        $director->buildFullFeaturedProduct();
        echo $builder->getProduct()->listParts();

        $builder->producePartA();
        $builder->producePartC();
        echo $builder->getProduct()->listParts();

        $this->assertTrue(true);
    }
}
