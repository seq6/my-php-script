<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Visitor;

class ConcreteComponentB implements Component
{
    public function accept(Visitor $visitor): void
    {
        $visitor->visitConcreteComponentB($this);
    }

    public function specialMethodOfConcreteComponentB(): string
    {
        return "B";
    }
}
