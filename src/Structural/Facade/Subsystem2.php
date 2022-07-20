<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Facade;

class Subsystem2
{
    public function operation1(): string
    {
        return 'Subsystem2:Ready!';
    }

    public function operationZ(): string
    {
        return 'Subsystem2:Fire!';
    }
}
