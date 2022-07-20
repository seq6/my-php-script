<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Bridge;

interface Implementation
{
    public function operationImplementation(): string;
}
