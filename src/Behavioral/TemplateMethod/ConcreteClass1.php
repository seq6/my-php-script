<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\TemplateMethod;

class ConcreteClass1 extends AbstractClass
{
    protected function requiredOperation1(): void
    {
        echo "ConcreteClass1 says: Implemented Operation1\n";
    }

    protected function requiredOperation2(): void
    {
        echo "ConcreteClass1 says: Implemented Operation2\n";
    }
}
