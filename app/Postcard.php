<?php

namespace App;

class Postcard
{
    public static function resolveFacade($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        return self::resolveFacade('Postcard')->$method(...$arguments);
    }
}
