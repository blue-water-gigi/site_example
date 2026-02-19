<?php

declare(strict_types=1);

namespace Core;

use Exception;

class Container
{

    protected $bindings = [];

    public function bind($key, $factoryFunc): void
    {
        $this->bindings[$key] = $factoryFunc;
    }

    public function resolve($key): mixed
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for your {$key}");

        } else {
            $factoryFunc = $this->bindings[$key];

            return call_user_func($factoryFunc);
        }
    }

}