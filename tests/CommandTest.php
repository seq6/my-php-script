<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Command\ComplexCommand;
use BasicDesignPattern\Behavioral\Command\Invoker;
use BasicDesignPattern\Behavioral\Command\Receiver;
use BasicDesignPattern\Behavioral\Command\SimpleCommand;
use PHPUnit\Framework\TestCase;

/**
 * 命令模式
 */
class CommandTest extends TestCase
{
    public function testCommand()
    {
        $invoker = new Invoker();
        $invoker->setOnStart(new SimpleCommand("Say Hi!"));
        $receiver = new Receiver();
        $invoker->setOnFinish(new ComplexCommand($receiver, "Send email", "Save report"));
        $invoker->doSomethingImportant();

        $this->assertTrue(true);
    }
}
