<?php
declare(strict_types=1);

// use JetBrains\PhpStorm\NoReturn;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// руты через ассоциативный массив
$routes = [
    "/" => 'controllers/index.php',
    "/about" => 'controllers/about.php',
    "/notes" => 'controllers/notes.php',
    "/note" => 'controllers/note.php',
    "/testing" => 'controllers/testing.php',
];

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