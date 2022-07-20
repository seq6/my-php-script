<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Builder;

interface Builder
{
    public function producePartA();
    public function producePartB();
    public function producePartC();
}
