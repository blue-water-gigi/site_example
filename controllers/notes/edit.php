<?php
declare(strict_types=1);

//! shows a form to edit a note

use Core\Database;
use Core\App;

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

//dd($note);
authorize($note['user_id'] === $currentUserId);


view('/notes/edit.view.php', [
    'heading' => "Edit a note",
    'errors' => [],
    'note' => $note
]);