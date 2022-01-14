<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class MySQLProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!class_exists('PDO')) {
            throw new Exception('ext-pdo is not installed.');
        }

        $client = new \PDO('mysql:host=mysql;port=3306;dbname=cache', 'root', '');

        parent::__construct(new \KadokWeb\Scrapbook\Adapters\MySQL($client));
    }
}
