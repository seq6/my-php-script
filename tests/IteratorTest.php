<?php

declare(strict_types=1);

namespace Tests;

use BasicDesignPattern\Behavioral\Iterator\WordsCollection;
use PHPUnit\Framework\TestCase;

/**
 * 迭代器模式
 */
class IteratorTest extends TestCase
{
    public function testIterator()
    {
        $collection = new WordsCollection();
        $collection->addItem('1st');
        $collection->addItem('2nd');
        $collection->addItem('3rd');

        foreach ($collection->getIterator() as $item) {
            echo $item . "\n";
        }

        foreach ($collection->getReverseIterator() as $item) {
            echo $item . "\n";
        }

        $this->assertTrue(true);
    }
}
