<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Structural\Composite\Composite;
use BasicDesignPattern\Structural\Composite\Leaf;
use PHPUnit\Framework\TestCase;

/**
 * 组合模式
 */
class CompositeTest extends TestCase
{
    public function testComposite()
    {
        $tree = new Composite();
        $branch1 = new Composite();
        $branch1->add(new Leaf());
        $branch1->add(new Leaf());
        $branch2 = new Composite();
        $branch2->add(new Leaf());
        $branch2->add(new Leaf());
        $tree->add($branch1);
        $tree->add($branch2);
        echo "\n" . $tree->operation() . "\n";
        $this->assertTrue(true);
    }
}
