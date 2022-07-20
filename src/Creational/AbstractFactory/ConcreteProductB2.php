<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\AbstractFactory;

class ConcreteProductB2 implements AbstractProductB
{
    public function usefulFunctionB(): string
    {
        return 'ConcreteProductB2';
    }

    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string
    {
        return $collaborator->usefulFunctionA();
    }
}
