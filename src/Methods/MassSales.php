<?php

namespace EasyDonate\Methods;

use EasyDonate\Managers\RequestManager;

class MassSales implements MethodInterface
{

    public static function get(RequestManager $request, array $arguments)
    {
        $active = boolval($arguments[0]);
        return $request->get('massSales?where_active=' . $active);
    }
}