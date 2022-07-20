<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Proxy;

class Proxy implements Subject
{
    private RealSubject $realSubject;

    public function __construct(RealSubject $realSubject)
    {
        $this->realSubject = $realSubject;
    }

    public function request()
    {
        if ($this->checkAccess()) {
            $this->realSubject->request();
            $this->logAccess();
        }
    }

    private function checkAccess(): bool
    {
        echo "Proxy: Checking access prior to firing a real request.\n";
        return true;
    }

    private function logAccess()
    {
        echo "Proxy: Logging the time of request.\n";
    }
}
