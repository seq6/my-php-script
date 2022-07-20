<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Visitor;

class ConcreteComponentA implements Component
{
    public function accept(Visitor $visitor): void
    {
        $visitor->visitConcreteComponentA($this);
    }

    public function exclusiveMethodOfConcreteComponentA(): string
    {
        return "A";
    }
}