<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\ChainOfResponsibility;

interface Handler
{
    public function setNext(Handler $handler): Handler;

    public function handle(string $request): ?string;
}
