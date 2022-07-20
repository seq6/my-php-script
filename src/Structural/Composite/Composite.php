<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Composite;

use SplObjectStorage;

class Composite extends Component
{
    protected $children;

    public function __construct()
    {
        $this->children = new SplObjectStorage();
    }

    public function add(Component $component)
    {
        $this->children->attach($component);
        $component->setParent($this);
    }

    public function remove(Component $component)
    {
        $this->children->detach($component);
        $component->setParent(null);
    }

    public function isComponent(): bool
    {
        return true;
    }

    public function operation(): string
    {
        $result = [];
        foreach ($this->children as $child) {
            $result[] = $child->operation();
        }
        return 'Branch(' . implode('+', $result) . ')';
    }
}
