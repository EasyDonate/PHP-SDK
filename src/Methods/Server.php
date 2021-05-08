<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Server implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get("server/{$arguments[0]}");
    }
}
