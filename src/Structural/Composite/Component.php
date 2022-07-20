<?php

declare(strict_types=1);

namespace BasicDesignPattern\Structural\Composite;

abstract class Component
{
    protected Component $parent;

    public function setParent(?Component $parent)
    {
        $this->parent = $parent;
    }

    public function getParent(): Component
    {
        return $this->parent;
    }

    public function add(Component $parent)
    {
    }

    public function remove(Component $parent)
    {
    }

    public function isComponent(): bool
    {
        return false;
    }

    abstract public function operation(): string;
}
