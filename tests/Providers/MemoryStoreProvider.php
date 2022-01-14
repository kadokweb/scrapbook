<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Tests\AdapterProvider;

class MemoryStoreProvider extends AdapterProvider
{
    public function __construct()
    {
        parent::__construct(new \KadokWeb\Scrapbook\Adapters\MemoryStore());
    }
}
