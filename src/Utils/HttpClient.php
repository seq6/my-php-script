<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Docs: https://guzzle-cn.readthedocs.io/zh_CN/latest/index.html
 */
class HttpClient
{
    private static Client $client;

    /**
     * 获取http连接
     *
     * @param integer $timeout
     * @return Client
     */
    public static function getClient(int $timeout = 10): Client
    {
        if (is_null(self::$client)) {
            self::$client = new Client([RequestOptions::TIMEOUT => $timeout]);
        }
        return self::$client;
    }

    /**
     * 创建新的http连接
     *
     * @param string $baseUri
     * @param integer $timeout
     * @return Client
     */
    public static function newBaseClient(string $baseUri, int $timeout = 10): Client
    {
        return new Client([
            'base_uri' => $baseUri,
            'timeout' => $timeout,
        ]);
    }
}
