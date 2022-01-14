<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class RedisProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('Redis')) {
            throw new Exception('ext-redis is not installed.');
        }

        $client = new \Redis();
        $client->connect('redis', '6379');

        // Redis databases are numeric
        parent::__construct(new \KadokWeb\Scrapbook\Adapters\Redis($client), 1);
    }
}
