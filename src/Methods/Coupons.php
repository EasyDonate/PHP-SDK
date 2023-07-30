<?php

namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class Coupons implements MethodInterface
{

    public static function get(RequestManager $request, array $arguments)
    {
        $active = boolval($arguments[0]);
        return $request->get('coupons?where_active=' . $active);
    }
}