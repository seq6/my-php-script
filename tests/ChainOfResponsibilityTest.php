<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\ChainOfResponsibility\DogHandler;
use BasicDesignPattern\Behavioral\ChainOfResponsibility\MonkeyHandler;
use BasicDesignPattern\Behavioral\ChainOfResponsibility\SquirrelHandler;
use PHPUnit\Framework\TestCase;

/**
 * 责任链模式
 */
class ChainOfResponsibilityTest extends TestCase
{
    public function testChainOfResponsibility()
    {
        $monkey = new MonkeyHandler();
        $squirrel = new SquirrelHandler();
        $dog = new DogHandler();
        $monkey->setNext($squirrel)->setNext($dog);

        foreach (["Nut", "Banana", "Cup of coffee"] as $food) {
            $result = $monkey->handle($food);
            if ($result) {
                echo " " . $result;
            } else {
                echo " " . $food . " was left untouched.\n";
            }
        }

        $this->assertTrue(true);
    }
}
