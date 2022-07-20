<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\AbstractFactory;

class ConcreteProductA2 implements AbstractProductA
{
    public function usefulFunctionA(): string
    {
        return 'ConcreteProductA2';
    }
}
