<?php

namespace KadokWeb\Scrapbook\Tests\Psr6\Integration;

use Cache\IntegrationTests\CachePoolTest;
use KadokWeb\Scrapbook\Adapters\Collections\Couchbase as CouchbaseCollection;
use KadokWeb\Scrapbook\Adapters\Collections\Memcached as MemcachedCollection;
use KadokWeb\Scrapbook\Adapters\Couchbase;
use KadokWeb\Scrapbook\Adapters\Memcached;
use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Psr6\Pool;
use KadokWeb\Scrapbook\Tests\AdapterProviderTestInterface;
use KadokWeb\Scrapbook\Tests\AdapterTestProvider;

class IntegrationPoolTest extends CachePoolTest implements AdapterProviderTestInterface
{
    /**
     * @var KeyValueStore
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $collectionName;

    /**
     * {@inheritdoc}
     */
    public static function suite()
    {
        $provider = new AdapterTestProvider(new static());

        return $provider->getSuite();
    }

    /**
     * {@inheritdoc}
     */
    public function setAdapter(KeyValueStore $adapter)
    {
        $this->adapter = $adapter;

        $this->skippedTests = array();
        if ($this->adapter instanceof Couchbase || $this->adapter instanceof CouchbaseCollection) {
            $this->skippedTests['testExpiration'] = "Couchbase TTL can't be relied on with 1 second precision";
            $this->skippedTests['testHasItemReturnsFalseWhenDeferredItemIsExpired'] = "Couchbase TTL can't be relied on with 1 second precision";
            $this->skippedTests['testBasicUsageWithLongKey'] = "Couchbase keys can't exceed 255 characters";
        } elseif ($this->adapter instanceof Memcached || $this->adapter instanceof MemcachedCollection) {
            $this->skippedTests['testBasicUsageWithLongKey'] = "Memcached keys can't exceed 255 characters";
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setCollectionName($name)
    {
        $this->collectionName = $name;
    }

    /**
     * @return Pool
     */
    public function createCachePool()
    {
        return new Pool($this->adapter);
    }
}
