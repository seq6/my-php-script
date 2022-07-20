<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Visitor;

interface Visitor
{
    public function visitConcreteComponentA(ConcreteComponentA $a): void;

    public function visitConcreteComponentB(ConcreteComponentB $b): void;
}
