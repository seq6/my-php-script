<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

/**
 * docs: https://github.com/elastic/elasticsearch-php
 */
class EsClient
{
    private static Client $client;

    public static function getClient(array $hosts = ['127.0.0.1']): Client
    {
        if (is_null(self::$client)) {
            self::$client = ClientBuilder::create()->setHosts($hosts)->build();
        }
        return self::$client;
    }
}
