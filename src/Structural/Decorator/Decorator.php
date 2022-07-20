<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Decorator;

class Decorator implements Component
{
    protected Component $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function operation(): string
    {
        return $this->component->operation();
    }
}
