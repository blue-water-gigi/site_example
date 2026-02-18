<?php
declare(strict_types=1);

$config = require __DIR__ . '/../../config.php';
$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

//dd($note);
authorize($note['user_id'] === $currentUserId);

require __DIR__ . '/../../views/notes/show.view.php';