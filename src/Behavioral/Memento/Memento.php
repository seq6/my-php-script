<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Memento;

interface Memento
{
    public function getName(): string;

    public function getDate(): string;
}
