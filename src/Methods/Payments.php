<?php namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Payments implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('payments');
    }
}
