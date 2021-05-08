<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Payment implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get("payment/{$arguments[0]}");
    }
}
