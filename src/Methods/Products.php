<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Products implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('products');
    }
}
