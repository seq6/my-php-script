<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\AbstractFactory;

class ConcreteProductA1 implements AbstractProductA
{
    public function usefulFunctionA(): string
    {
        return 'ConcreteProductA1';
    }
}
