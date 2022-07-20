<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\FactoryMethod;

class ConcreteCreator1 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}
