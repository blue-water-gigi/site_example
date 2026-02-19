<?php

declare(strict_types=1);

namespace Core;

class App
{
    protected static Container $container;
    public static function setContainer(Container $container): void
    {
        static::$container = $container;
    }

    public static function getContainer(): Container
    {
        return static::$container;
    }

    public static function bind($key, $fuctoryFunc)
    {
        static::$container->bind($key, $fuctoryFunc);
    }

    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}