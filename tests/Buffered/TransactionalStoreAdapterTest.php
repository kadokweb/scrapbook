<?php

namespace KadokWeb\Scrapbook\Tests\Buffered;

use KadokWeb\Scrapbook\Buffered\TransactionalStore;
use KadokWeb\Scrapbook\Exception\UnbegunTransaction;
use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Tests\AdapterTest;

class TransactionalStoreAdapterTest extends AdapterTest
{
    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = new TransactionalStore($adapter);
    }

    protected function compatSetUp()
    {
        parent::compatSetUp();

        $this->cache->begin();
    }

    protected function compatTearDown()
    {
        parent::compatTearDown();

        try {
            $this->cache->rollback();
        } catch (UnbegunTransaction $e) {
            // this is alright, guess we've terminated the transaction already
        }
    }
}
