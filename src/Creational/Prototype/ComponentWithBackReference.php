<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Prototype;

class ComponentWithBackReference
{
    public $prototype;

    public function __construct($prototype)
    {
        $this->prototype = $prototype;
    }
}
