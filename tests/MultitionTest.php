<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Creational\Multiton\Multiton;
use PHPUnit\Framework\TestCase;

/**
 * 多例模式
 */
class MultitonTest extends TestCase
{
    public function testMultiton()
    {
        $mulA = Multiton::getInstance('A');
        $mulB = Multiton::getInstance('B');
        $this->assertNotSame($mulA, $mulB);
    }
}
