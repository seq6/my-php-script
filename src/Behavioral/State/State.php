<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\State;

abstract class State
{
    protected Context $context;

    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    abstract public function handle1(): void;
    abstract public function handle2(): void;
}
