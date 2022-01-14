<?php

namespace KadokWeb\Scrapbook\Tests;

use KadokWeb\Scrapbook\KeyValueStore;
use PHPUnit\Framework\TestSuite;

interface AdapterProviderTestInterface
{
    /**
     * @return TestSuite
     */
    public static function suite();

    /**
     * This is where AdapterProvider will inject the adapter to.
     */
    public function setAdapter(KeyValueStore $adapter);

    /**
     * This is where AdapterProvider will inject the adapter to.
     *
     * @param string $name
     */
    public function setCollectionName($name);
}
