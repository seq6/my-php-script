<?php

declare(strict_types=1);

namespace BasicDesignPattern\Behavioral\Command;

class Invoker
{
    private Command $onStart;
    private Command $onFinish;

    public function setOnStart(Command $command)
    {
        $this->onStart = $command;
    }

    public function setOnFinish(Command $command)
    {
        $this->onFinish = $command;
    }

    public function doSomethingImportant()
    {
        if ($this->onStart instanceof Command) {
            $this->onStart->execute();
        }
        if ($this->onFinish instanceof Command) {
            $this->onFinish->execute();
        }
    }
}
