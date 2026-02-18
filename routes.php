<?php
declare(strict_types=1);

// руты через ассоциативный массив
return [
    "/" => 'controllers/index.php',
    "/about" => 'controllers/about.php',
    "/notes" => 'controllers/notes/index.php',
    "/note" => 'controllers/notes/show.php',
    "/notes/create" => 'controllers/notes/create.php',
    "/testing" => 'controllers/testing.php',
];