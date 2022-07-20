<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Strategy;

interface Strategy
{
    public function doAlgorithm(array $data): array;
}
