<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Builder;

class ConcreteBuilder implements Builder
{
    private Product $product;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->product = new Product();
    }

    public function producePartA()
    {
        $this->product->parts[] = 'PartA';
    }

    public function producePartB()
    {
        $this->product->parts[] = 'PartB';
    }

    public function producePartC()
    {
        $this->product->parts[] = 'PartC';
    }

    public function getProduct(): Product
    {
        $result = $this->product;
        $this->reset();
        return $result;
    }
}
