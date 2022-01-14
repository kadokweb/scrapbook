<?php

namespace KadokWeb\Scrapbook\Tests\Psr16\Integration;

use Cache\IntegrationTests\SimpleCacheTest;
use KadokWeb\Scrapbook\Adapters\Collections\Couchbase as CouchbaseCollection;
use KadokWeb\Scrapbook\Adapters\Collections\Memcached as MemcachedCollection;
use KadokWeb\Scrapbook\Adapters\Couchbase;
use KadokWeb\Scrapbook\Adapters\Memcached;
use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Psr16\SimpleCache;
use KadokWeb\Scrapbook\Tests\AdapterProviderTestInterface;
use KadokWeb\Scrapbook\Tests\AdapterTestProvider;

class IntegrationTest extends SimpleCacheTest implements AdapterProviderTestInterface
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

        $this->skippedTests = array(
            'testSetInvalidTtl' => 'Skipping test because this is not defined in PSR-16',
            'testSetMultipleInvalidTtl' => 'Skipping test because this is not defined in PSR-16',
        );
        if ($this->adapter instanceof Couchbase || $this->adapter instanceof CouchbaseCollection) {
            $this->skippedTests['testSetTtl'] = "Couchbase TTL can't be relied on with 1 second precision";
            $this->skippedTests['testSetMultipleTtl'] = "Couchbase TTL can't be relied on with 1 second precision";
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
     * @return SimpleCache
     */
    public function createSimpleCache()
    {
        return new SimpleCache($this->adapter);
    }
}
