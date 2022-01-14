<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class SQLiteProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('PDO')) {
            throw new Exception('ext-pdo is not installed.');
        }

        $client = new \PDO('sqlite::memory:');

        parent::__construct(new \KadokWeb\Scrapbook\Adapters\SQLite($client));
    }
}
