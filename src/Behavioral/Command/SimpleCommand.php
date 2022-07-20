<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Command;

class SimpleCommand implements Command
{
    private string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function execute(): void
    {
        echo $this->payload . "\n";
    }
}
