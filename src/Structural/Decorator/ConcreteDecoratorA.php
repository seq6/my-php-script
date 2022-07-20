<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Decorator;

class ConcreteDecoratorA extends Decorator
{
    public function operation(): string
    {
        return 'ConcreteDecoratorA: ' . parent::operation();
    }
}
