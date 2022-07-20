<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\ChainOfResponsibility;

class SquirrelHandler extends AbstractHandler
{
    public function handle(string $request): ?string
    {
        if ($request === 'Nut') {
            return "Squirrel: I'll eat the " . $request . ".\n";
        } else {
            return parent::handle($request);
        }
    }
}
