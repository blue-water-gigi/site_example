<?php
declare(strict_types=1);

//! controller deletes the note

use Core\Database;
use Core\App;

// $config = require base_path('/config.php');
// $db = new Database($config['database']);

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;

// dd($db);

$currentUserId = 1;

$note = $db->query('SELECT * from notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE from notes where id = :id', [
    'id' => $_POST['id']
]);


header('location: /notes');
exit();