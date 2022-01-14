<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class MemcachedProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('Memcached')) {
            throw new Exception('ext-memcached is not installed.');
        }

        $client = new \Memcached();
        $client->addServer('memcached', '11211');

        parent::__construct(new \KadokWeb\Scrapbook\Adapters\Memcached($client));
    }
}
