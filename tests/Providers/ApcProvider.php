<?php

namespace KadokWeb\Scrapbook\Tests\Providers;

use KadokWeb\Scrapbook\Exception\Exception;
use KadokWeb\Scrapbook\Tests\AdapterProvider;

class ApcProvider extends AdapterProvider
{
    public function __construct()
    {
        if (!function_exists('apc_fetch') && !function_exists('apcu_fetch')) {
            throw new Exception('ext-apc(u) is not installed.');
        }

        parent::__construct(new \KadokWeb\Scrapbook\Adapters\Apc());
    }
}
