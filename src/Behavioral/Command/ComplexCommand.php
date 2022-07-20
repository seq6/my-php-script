<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Command;

class ComplexCommand implements Command
{
    private Receiver $receiver;
    private string $a;
    private string $b;

    public function __construct(Receiver $receiver, string $a, string $b)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }

    public function execute(): void
    {
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
    }
}
