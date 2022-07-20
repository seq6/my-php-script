<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Decorator;

class ConcreteComponent implements Component
{
    public function operation(): string
    {
        return 'ConcreteComponent';
    }
}
