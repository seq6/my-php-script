<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Facade;

class Subsystem1
{
    public function operation1(): string
    {
        return 'Subsystem1:Ready!';
    }

    public function operationN(): string
    {
        return 'Subsystem1:Go!';
    }
}
