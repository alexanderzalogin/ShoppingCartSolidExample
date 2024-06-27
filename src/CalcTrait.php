<?php

namespace App;

trait CalcTrait
{
    private static $instances = [];
    private $items = [];

    public static function getInstance()
    {
        $self = static::class;
        if (!isset(self::$instances[$self])) {
            self::$instances[$self] = new $self;
        }
        return self::$instances[$self];
    }

    protected static function hasInstance()
    {
        $self = static::class;
        return isset(self::$instances[$self]);
    }
}
