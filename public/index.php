<?php
declare(strict_types=1);

use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/utils.php';

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

    $file = base_path("{$class}.php");
    if (file_exists($file)) {
        require $file;
    }
});

require base_path('bootstrap.php');


$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

// clear flashed session data
Session::unflash();
error_log('SESSION after unflash: ' . print_r($_SESSION, true));