<?php

namespace KadokWeb\Scrapbook\Tests\Collections;

use KadokWeb\Scrapbook\Tests\AdapterTest;

class CollectionsAdapterTest extends AdapterTest
{
    protected function compatSetUp()
    {
        parent::compatSetUp();

        // I'll do this here instead of in setAdapter, because that runs before
        // the test suite, but I want a new collection for every single test
        $this->cache = $this->cache->getCollection($this->collectionName);
    }

    public function testCollectionGetParentKey()
    {
        $this->markTestSkipped(
            'This test is invalid for collections derived from collections. ' .
                "They don't keep nesting, there's only server/collection."
        );
    }

    public function testCollectionGetCollectionKey()
    {
        $this->markTestSkipped(
            'This test is invalid for collections derived from collections. ' .
                "They don't keep nesting, there's only server/collection."
        );
    }

    public function testCollectionSetSameKey()
    {
        $this->markTestSkipped(
            'This test is invalid for collections derived from collections. ' .
                "They don't keep nesting, there's only server/collection."
        );
    }

    public function testCollectionFlushParent()
    {
        $this->markTestSkipped(
            'This test is invalid for collections derived from collections. ' .
                "They don't keep nesting, there's only server/collection."
        );
    }

    public function testCollectionFlushCollection()
    {
        $this->markTestSkipped(
            'This test is invalid for collections derived from collections. ' .
                "They don't keep nesting, there's only server/collection."
        );
    }
}
