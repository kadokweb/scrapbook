<?php

namespace KadokWeb\Scrapbook\Tests;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\KeyValueStore;

class AdapterProvider
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
     * @param string $collectionName
     *
     * @throws Exception
     */
    public function __construct(KeyValueStore $adapter, $collectionName = 'collection')
    {
        $this->adapter = $adapter;
        $this->collectionName = $collectionName;
    }

    /**
     * @return KeyValueStore
     *
     * @throws Exception
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @return string
     */
    public function getCollectionName()
    {
        return $this->collectionName;
    }
}
