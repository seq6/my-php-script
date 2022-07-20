<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Builder;

class Product
{
    public $parts = [];

    public function listParts()
    {
        return json_encode($this->parts);
    }
}
