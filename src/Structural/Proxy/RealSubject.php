<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Proxy;

class RealSubject implements Subject
{
    public function request()
    {
        echo "RealSubject: Handling request.\n";
    }
}
