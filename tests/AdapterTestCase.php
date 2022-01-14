<?php

namespace KadokWeb\Scrapbook\Tests;

use KadokWeb\Scrapbook\KeyValueStore;
use KadokWeb\Scrapbook\Tests\PHPUnitCompat\CompatTestCase;

class AdapterTestCase extends CompatTestCase implements AdapterProviderTestInterface
{
    /**
     * @var KeyValueStore
     */
    protected $cache;

    /**
     * @var string
     */
    protected $collectionName;

    public static function suite()
    {
        $provider = new AdapterTestProvider(new static());

        return $provider->getSuite();
    }

    public function setAdapter(KeyValueStore $adapter)
    {
        $this->cache = $adapter;
    }

    public function setCollectionName($name)
    {
        $this->collectionName = $name;
    }

    protected function compatTearDown()
    {
        parent::compatTearDown();
        $this->cache->flush();
    }
}
