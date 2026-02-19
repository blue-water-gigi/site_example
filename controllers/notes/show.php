<?php
declare(strict_types=1);

use Core\Database;

$config = require base_path('/config.php');
$db = new Database($config['database']);

$currentUserId = 25;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $_POST['id']
    ]);


    header('location: /notes');
    exit();

} else {

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id'],
    ])->findOrFail();

    //dd($note);

    view('/notes/show.view.php', [
        'heading' => "Create a note",
        'note' => $note
    ]);
}