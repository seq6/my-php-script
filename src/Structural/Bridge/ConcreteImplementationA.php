<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Bridge;

class ConcreteImplementationA implements Implementation
{
    public function operationImplementation():string
    {
        return 'ConcreteImplementationA';
    }
}
