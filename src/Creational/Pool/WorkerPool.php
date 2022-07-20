<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Pool;

use Countable;

class WorkerPool implements Countable
{
    private $occupiedWorkers = [];

    private $freeWorkers = [];

    public function get(): Worker
    {
        if (count($this->freeWorkers) == 0) {
            $worker = new Worker();
        } else {
            $worker = array_pop($this->freeWorkers);
        }
        $this->occupiedWorkers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    public function dispose(Worker $worker)
    {
        $key = spl_object_hash($worker);

        if (isset($this->occupiedWorkers[$key])) {
            unset($this->occupiedWorkers[$key]);
            $this->freeWorkers[$key] = $worker;
        }
    }

    public function count()
    {
        return count($this->occupiedWorkers) + count($this->freeWorkers);
    }
}
