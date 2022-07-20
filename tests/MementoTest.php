<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Memento\Caretaker;
use BasicDesignPattern\Behavioral\Memento\Originator;
use PHPUnit\Framework\TestCase;

/**
 * 备忘录模式
 */
class MementoTest extends TestCase
{
    public function testMemento()
    {
        $originator = new Originator('Super-duper-super-puper-super.');
        $caretaker = new Caretaker($originator);

        $caretaker->backup();
        $originator->doSomething();

        $caretaker->backup();
        $originator->doSomething();

        $caretaker->backup();
        $originator->doSomething();

        echo "\n";
        $caretaker->showHistory();

        echo "\nClient: Now, let's rollback!\n\n";
        $caretaker->undo();

        echo "\nClient: Once more!\n\n";
        $caretaker->undo();

        $this->assertTrue(true);
    }
}
