<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Bridge;

class Abstraction
{
    protected Implementation $implementation;

    public function __construct(Implementation $implementation)
    {
        $this->implementation = $implementation;
    }

    public function operation(): string
    {
        return "Abstraction: Base operation with:\n" .
            $this->implementation->operationImplementation();
    }
}
