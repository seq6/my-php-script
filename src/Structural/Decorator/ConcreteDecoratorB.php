<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Decorator;

class ConcreteDecoratorB extends Decorator
{
    public function operation(): string
    {
        return 'ConcreteDecoratorB: ' . parent::operation();
    }
}
