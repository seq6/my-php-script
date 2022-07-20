<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Command;

interface Command
{
    public function execute(): void;
}
