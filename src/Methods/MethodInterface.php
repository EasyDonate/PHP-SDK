<?php namespace L4dno\Methods;

use L4dno\Managers\RequestManager;

interface MethodInterface
{
    public static function get(RequestManager $requestManager, array $arguments);
}
