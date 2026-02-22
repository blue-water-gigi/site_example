<?php
declare(strict_types=1);

use Core\Response;

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


function abort(int $code = 404): never
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}


function authorize(bool $condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, mixed $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect(string $path): never
{
    header("location: {$path}");
    exit();
}

function old(string $key, mixed $default = ''): mixed
{
    return Core\Session::get('old')['email'] ?? $default;
}

//dd($_SERVER);
//echo $_SERVER['REQUEST_URI'];