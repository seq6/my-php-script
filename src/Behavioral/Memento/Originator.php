<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Memento;

class Originator
{
    private string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
        echo "Originator: My initial state is: {$this->state}\n";
    }

    public function doSomething(): void
    {
        echo "Originator: I'm doing something important.\n";
        $this->state = $this->generateRandomString(30);
        echo "Originator: and my state has changed to: {$this->state}\n";
    }

    private function generateRandomString(int $length = 10): string
    {
        return session_create_id();
       //return substr(
       //    str_shuffle(
       //        str_repeat(
       //            $x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
       //            ceil($length / strlen($x))
       //        )
       //    ),
       //    1,
       //    $length,
       //);
    }

    public function save(): Memento
    {
        return new ConcreteMemento($this->state);
    }

    public function restore(ConcreteMemento $memento): void
    {
        $this->state = $memento->getState();
        echo "Originator: My state has changed to: {$this->state}\n";
    }
}
