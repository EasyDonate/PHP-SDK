<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Servers implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('servers');
    }
}
