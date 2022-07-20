<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\ChainOfResponsibility;

class MonkeyHandler extends AbstractHandler
{
    public function handle(string $request): ?string
    {
        if ($request === 'Banana') {
            return 'Monkey: I\'ll eat the ' . $request . "\n";
        } else{
            return parent::handle($request);
        }
    }
}
