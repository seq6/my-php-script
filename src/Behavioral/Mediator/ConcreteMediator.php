<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Mediator;

class ConcreteMediator implements Mediator
{
    private Component1 $component1;

    private Component2 $component2;

    public function __construct(Component1 $component1, Component2 $component2)
    {
        $this->component1 = $component1;
        $this->component1->setMediator($this);
        $this->component2 = $component2;
        $this->component2->setMediator($this);
    }

    public function notify(object $sender, string $event): void
    {
        if ($event == "A") {
            echo "Mediator reacts on A and triggers following operations:\n";
            $this->component2->doC();
        }

        if ($event == "D") {
            echo "Mediator reacts on D and triggers following operations:\n";
            $this->component1->doB();
            $this->component2->doC();
        }
    }
}
