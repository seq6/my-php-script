<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\SimpleFactory;

/**
 * 简单工厂模式
 */
class SimpleFactory
{
    public function create(): Product
    {
        return new Product();
    }
}
