<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Facade;

class Facade
{
    protected Subsystem1 $subsystem1;
    protected Subsystem2 $subsystem2;

    public function __construct(
        Subsystem1 $subsystem1 = null,
        Subsystem2 $subsystem2 = null
    ) {
        $this->subsystem1 = $subsystem1;
        $this->subsystem2 = $subsystem2;
    }

    public function operation(): string
    {
        $result = [];
        $result[] = 'Facade initializes subsystem:';
        $result[] = $this->subsystem1->operation1();
        $result[] = $this->subsystem2->operation1();
        $result[] = 'Facade orders subsystems to perform the action:';
        $result[] = $this->subsystem1->operationN();
        $result[] = $this->subsystem2->operationZ();
        return implode("\n", $result);
    }
}
