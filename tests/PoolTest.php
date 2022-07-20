<?php

declare(strict_types=1);

namespace BasicDesignPattern\Pool;

use BasicDesignPattern\Creational\Pool\WorkerPool;
use PHPUnit\Framework\TestCase;

/**
 * 对象池
 */
class PoolTest extends TestCase
{
    public function testPool()
    {
        $pool = new WorkerPool();
        $worker1 = $pool->get();
        $worker2 = $pool->get();

        $this->assertCount(2, $pool);
        $this->assertNotSame($worker1, $worker2);

        $pool->dispose($worker1);
        $worker3 = $pool->get();
        $this->assertCount(2, $pool);
        $this->assertNotSame($worker3, $worker2);
    }
}
