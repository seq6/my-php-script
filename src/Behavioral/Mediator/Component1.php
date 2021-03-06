<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Mediator;

class Component1 extends BaseComponent
{
    public function doA(): void
    {
        echo "Component 1 does A.\n";
        $this->mediator->notify($this, 'A');
    }

    public function doB(): void
    {
        echo "Component 1 does B.\n";
        $this->mediator->notify($this, 'B');
    }
}
