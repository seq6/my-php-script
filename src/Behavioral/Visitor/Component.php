<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Visitor;

interface Component
{
    public function accept(Visitor $visitor): void;
}
