<?php
declare(strict_types=1);

$routes = require __DIR__ . '/routes.php';

// use JetBrains\PhpStorm\NoReturn;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($uri, $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}


function abort(int $code = 404): never
{
    http_response_code($code);
    require __DIR__ . "/views/{$code}.php";
    exit();
}

routeToController($uri, $routes);