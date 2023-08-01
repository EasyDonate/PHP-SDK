<?php namespace L4dno\Methods;

use L4dno\Managers\RequestManager;

class Shop implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('');
    }
}
