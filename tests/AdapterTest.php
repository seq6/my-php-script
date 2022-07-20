<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Adapter\Adaptee;
use BasicDesignPattern\Structural\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    public function testAdapter()
    {
        $adapter = new Adapter(new Adaptee());
        echo $adapter->request();
        $this->assertTrue(true);
    }
}
