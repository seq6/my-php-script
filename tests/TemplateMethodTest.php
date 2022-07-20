<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\TemplateMethod\ConcreteClass1;
use BasicDesignPattern\Behavioral\TemplateMethod\ConcreteClass2;
use PHPUnit\Framework\TestCase;

/**
 * 模板方法
 */
class TemplateMethodTest extends TestCase
{
    public function testTemplateMethod()
    {
        echo "Same client code can work with different subclasses:\n";
        (new ConcreteClass1())->templateMethod();
        echo "\n";

        echo "Same client code can work with different subclasses:\n";
        (new ConcreteClass2())->templateMethod();

        $this->assertTrue(true);
    }
}
