<?php

//! controller stores the note after you submit it

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'Title must be no more than 100 characters';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

if (!empty($erorrs)) {
    view('/notes/create.view.php', [
        'heading' => "Create a note",
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (title,user_id,body) VALUES (:title,:user_id,:body)', [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'user_id' => 1,
]);

header('location: /notes');
die();



