<?php

namespace KadokWeb\Scrapbook\Tests\Psr16;

use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Psr16\SimpleCache;
use KadokWeb\Scrapbook\Tests\AdapterTestCase;

class Psr16TestCase extends AdapterTestCase
{
    /**
     * @var SimpleCache
     */
    protected $simplecache;

    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = $adapter;
        $this->simplecache = new SimpleCache($adapter);
    }
}
