<?php

declare(strict_types=1);

//! updates note

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class); // Database::class переведётся в стрингу с путём к Database;

$currentUserId = 1;


// find the coresponding note
$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

// authorize that the current user cant edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form

$errors = [];

if (!Validator::string($_POST['title'], 1, 100)) {
    $errors['title'] = 'Title must be no more than 100 characters';
}

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required.';
}

// if no validation errors -> update the notes database table\

if (count($errors)) {
    return view('notes/edit.view.php', [
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('UPDATE notes set body = :body, title = :title where id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body']
]);

//redirect the user

header('location: /notes');
exit();