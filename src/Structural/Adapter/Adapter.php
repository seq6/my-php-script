<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Adapter;

class Adapter extends Target
{
    private Adaptee $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request(): string
    {
        return 'Adapter: (TRANSLATED) ' . strrev($this->adaptee->specificRequest());
    }
}
