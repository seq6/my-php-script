<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

/**
 * 单例模式
 */
class SingletonTest extends TestCase
{
    public function testSingleton()
    {
        $s1 = Singleton::getInstance();
        $s2 = Singleton::getInstance();
        $this->assertSame($s1, $s2);
    }
}
