<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Shop implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('');
    }
}
