<?php

namespace KadokWeb\Scrapbook\Psr6;

use KadokWeb\Scrapbook\Exception\Exception;

class InvalidArgumentException extends Exception implements \Psr\Cache\InvalidArgumentException
{
}
