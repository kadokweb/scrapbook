<?php

namespace KadokWeb\Scrapbook\Tests\Buffered;

use KadokWeb\Scrapbook\Buffered\BufferedStore;
use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Tests\AdapterTest;

class BufferedStoreAdapterTest extends AdapterTest
{
    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = new BufferedStore($adapter);
    }
}
