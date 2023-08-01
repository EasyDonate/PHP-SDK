<?php namespace L4dno\Methods;

use L4dno\Managers\RequestManager;

class Payments implements MethodInterface
{
    public static function get(RequestManager $request, array $arguments)
    {
        return $request->get('payments');
    }
}
