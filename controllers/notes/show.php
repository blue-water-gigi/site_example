<?php
declare(strict_types=1);

//! controller show specific note that you choose

use Core\Database;
use Core\App;

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;

$currentUserId = 1;

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

    //dd($note);
    authorize($note['user_id'] === $currentUserId);

    view('/notes/show.view.php', [
        'heading' => "Create a note",
        'note' => $note
    ]);
