<?php

declare(strict_types=1);

namespace BasicDesignPattern\Creational\Multiton;

final class Multiton
{
    private static $instances = [];

    /**
     * 私有方法阻止用户随意的创建该对象实例
     */
    private function __construct()
    {
    }

    /**
     * 阻止实例被克隆
     */
    private function __clone()
    {
    }

    /**
     * 阻止实例被序列化
     */
    private function __wakeup()
    {
    }

    public static function getInstance(string $instanceName): Multiton
    {
        if (!isset(self::$instances[$instanceName])) {
            self::$instances[$instanceName] = new self();
        }
        return self::$instances[$instanceName];
    }
}
