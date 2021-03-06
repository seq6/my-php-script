<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\FactoryMethod;

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}
