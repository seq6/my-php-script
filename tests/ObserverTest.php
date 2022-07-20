<?php

declare(strict_types=1);

use BasicDesignPattern\Behavioral\Observer\ConcreteObserverA;
use BasicDesignPattern\Behavioral\Observer\ConcreteObserverB;
use BasicDesignPattern\Behavioral\Observer\Subject;
use PHPUnit\Framework\TestCase;

/**
 * 观察者模式
 */
class ObserverTest extends TestCase
{
    public function testObserver()
    {
        $subject = new Subject();

        $o1 = new ConcreteObserverA();
        $subject->attach($o1);
        $o2 = new ConcreteObserverB();
        $subject->attach($o2);

        $subject->someBusinessLogic();
        $subject->someBusinessLogic();

        $subject->detach($o2);
        $subject->someBusinessLogic();

        $this->assertTrue(true);
    }
}
