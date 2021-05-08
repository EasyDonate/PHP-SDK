<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

interface MethodInterface
{
    public static function get(RequestManager $requestManager, array $arguments);
}
