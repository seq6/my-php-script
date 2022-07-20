<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Observer;

use SplObserver;
use SplSubject;

class ConcreteObserverA implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if ($subject->state < 3) {
            echo "ConcreteObserverA: Reacted to the event.\n";
        }
    }
}
