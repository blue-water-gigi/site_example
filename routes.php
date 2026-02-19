<?php
declare(strict_types=1);

// руты через ассоциативный массив
// return [
//     "/" => 'controllers/index.php',
//     "/about" => 'controllers/about.php',
//     "/notes" => 'controllers/notes/index.php',
//     "/note" => 'controllers/notes/show.php',
//     "/notes/create" => 'controllers/notes/create.php',
//     "/testing" => 'controllers/testing.php',
// ];


$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/testing', 'controllers/testing.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->delete('/note', 'controllers/notes/destroy.php');