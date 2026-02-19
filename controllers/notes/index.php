<?php
declare(strict_types=1);

use Core\Database;
use Core\App;

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;


$notes = $db->query('select * from notes where user_id = 1')->findAll();
//dd($notes);

view('/notes/index.view.php', [
    'heading' => "My Notes",
    'notes' => $notes
]);