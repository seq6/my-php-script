<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\StaticFactory;

use InvalidArgumentException;

final class StaticFactory
{
    public static function factory(string $type): Product
    {
        switch ($type) {
            case 'A':
                return new ConcreteProductA();
            case 'B':
                return new ConcreteProductB();
            default:
                throw new InvalidArgumentException("Error param: type = $type");
        }
    }
}
