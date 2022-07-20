<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Adapter;

class Target
{
    public function request(): string
    {
        return 'Target: The default target\'s behavior.';
    }
}
