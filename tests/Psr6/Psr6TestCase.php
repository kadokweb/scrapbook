<?php

namespace KadokWeb\Scrapbook\Tests\Psr6;

use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Psr6\Pool;
use KadokWeb\Scrapbook\Tests\AdapterTestCase;

class Psr6TestCase extends AdapterTestCase
{
    /**
     * @var Pool
     */
    protected $pool;

    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = $adapter;
        $this->pool = new Pool($adapter);
    }
}
