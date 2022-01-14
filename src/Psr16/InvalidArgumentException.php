<?php

namespace KadokWeb\Scrapbook\Psr16;

use KadokWeb\Scrapbook\Exception\Exception;

class InvalidArgumentException extends Exception implements \Psr\SimpleCache\InvalidArgumentException
{
}
