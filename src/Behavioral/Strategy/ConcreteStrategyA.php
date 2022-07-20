<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Strategy;

class ConcreteStrategyA implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        rsort($data);
        return $data;
    }
}
