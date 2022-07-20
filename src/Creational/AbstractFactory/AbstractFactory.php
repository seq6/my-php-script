<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\AbstractFactory;

interface AbstractFactory
{
    public function createProductA();

    public function createProductB();
}
