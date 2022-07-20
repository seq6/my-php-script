<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Facade\Facade;
use BasicDesignPattern\Structural\Facade\Subsystem1;
use BasicDesignPattern\Structural\Facade\Subsystem2;
use PHPUnit\Framework\TestCase;

/**
 * 门面模式
 */
class FacadeTest extends TestCase
{
    public function testFacade()
    {
        $facade = new Facade(new Subsystem1(), new Subsystem2());
        echo "\n" . $facade->operation() . "\n";
        $this->assertTrue(true);
    }
}
