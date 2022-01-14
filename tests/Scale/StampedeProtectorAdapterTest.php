<?php

namespace KadokWeb\Scrapbook\Tests\Scale;

use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Tests\AdapterTest;

class StampedeProtectorAdapterTest extends AdapterTest
{
    /**
     * Time (in milliseconds) to protect against stampede.
     *
     * @var int
     */
    const SLA = 100;

    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = new StampedeProtectorStub($adapter, static::SLA);
    }
}
