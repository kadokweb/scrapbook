<?php

namespace KadokWeb\Scrapbook\Tests\Scale;

use KadokWeb\Scrapbook\Adapters\MemoryStore;
use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Scale\Shard;
use KadokWeb\Scrapbook\Tests\AdapterTest;

class ShardAdapterTest extends AdapterTest
{
    public function setAdapter(KeyValueStore $adapter)
    {
        $other = new MemoryStore();

        $this->cache = new Shard($adapter, $other);
    }
}
