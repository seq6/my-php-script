<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\AbstractFactory;

interface AbstractProductB
{
    public function usefulFunctionB(): string;

    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string;
}
