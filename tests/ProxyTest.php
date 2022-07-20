<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Proxy\Proxy;
use BasicDesignPattern\Structural\Proxy\RealSubject;
use PHPUnit\Framework\TestCase;

/**
 * 代理模式
 */
class ProxyTest extends TestCase
{
    public function testProxy()
    {
        $realSubject = new RealSubject();
        $realSubject->request();

        $proxy = new Proxy($realSubject);
        $proxy->request();

        $this->assertTrue(true);
    }
}
