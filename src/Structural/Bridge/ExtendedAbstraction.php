<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Bridge;

class ExtendedAbstraction extends Abstraction
{
    public function operation(): string
    {
        return $this->implementation->operationImplementation();
    }
}
