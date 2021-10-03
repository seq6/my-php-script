<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

/**
 * docs: https://github.com/phpredis/phpredis
 */
class RedisClient
{
    private static Redis $client;

    /**
     * 获取redis连接
     *
     * @param string $host
     * @param integer $port
     * @param integer $timeout
     * @return Redis
     */
    public static function getClient(string $host = '127.0.0.1', int $port = 6379, int $timeout = 5): Redis
    {
        if (is_null(self::$client)) {
            self::$client = new Redis([
                'host' => $host,
                'port' => $port,
                'connectTimeout' => $timeout,
            ]);
        }
        return self::$client;
    }
}
