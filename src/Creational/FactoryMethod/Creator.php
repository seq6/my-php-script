<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\FactoryMethod;

abstract class Creator
{
    abstract public function factoryMethod(): Product;
}
