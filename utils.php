<?php

declare(strict_types=1);
function dd(mixed $value): void
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs(mixed $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize(bool $condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}


//dd($_SERVER);
//echo $_SERVER['REQUEST_URI'];