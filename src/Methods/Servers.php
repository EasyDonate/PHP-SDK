<?php namespace L4dno\Methods;

use L4dno\Managers\RequestManager;

class Servers implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('servers');
    }
}
