<?php

declare(strict_types=1);

namespace Core\Middleware;

use Exception;

class Middleware
{
    public const array MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve(?string $key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? null;

        if (!$middleware) {
            throw new Exception("No mathing middleware found for key: '{$key}'");
        }

        (new $middleware)->handle();
    }

}