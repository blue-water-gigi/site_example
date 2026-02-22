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

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}

function login($user): void
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();

    setcookie(
        'PHPSESSID',
        '',
        time() - 3600,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

//dd($_SERVER);
//echo $_SERVER['REQUEST_URI'];