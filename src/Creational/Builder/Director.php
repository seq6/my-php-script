<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Builder;

class Director
{
    private Builder $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function buildMinimalViableProduct()
    {
        $this->builder->producePartA();
    }

    public function buildFullFeaturedProduct(): void
    {
        $this->builder->producePartA();
        $this->builder->producePartB();
        $this->builder->producePartC();
    }
}
