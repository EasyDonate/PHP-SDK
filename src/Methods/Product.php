<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Product implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get("product/{$arguments[0]}");
    }
}
