<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Bridge;

class ConcreteImplementationB implements Implementation
{
    public function operationImplementation(): string
    {
        return 'ConcreteImplementationB';
    }
}
