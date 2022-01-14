<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class PostgreSQLProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('PDO')) {
            throw new Exception('ext-pdo is not installed.');
        }

        $client = new \PDO('pgsql:host=postgresql;port=5432;dbname=cache', 'user', 'pass');

        parent::__construct(new \KadokWeb\Scrapbook\Adapters\PostgreSQL($client));
    }
}
