<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Observer;

use SplObserver;
use SplSubject;

class ConcreteObserverB implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if ($subject->state == 0 || $subject->state >= 2) {
            echo "ConcreteObserverB: Reacted to the event.\n";
        }
    }
}
