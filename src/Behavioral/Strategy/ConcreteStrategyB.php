<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Strategy;

class ConcreteStrategyB implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        sort($data);
        return $data;
    }
}
