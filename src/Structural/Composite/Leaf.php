<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Composite;

class Leaf extends Component
{
    public function operation(): string
    {
        return 'Leaf';
    }
}
