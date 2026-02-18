<?php
declare(strict_types=1);

require __DIR__ . '/../../Validator.php';

$config = require __DIR__ . '/../../config.php';
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['title'], 1, 100)) {
        $errors['title'] = 'Title must be no more than 100 characters';
    }

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1000 characters is required.';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (title,user_id,body) VALUES (:title,:user_id,:body)', [
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

require __DIR__ . "/../../views/notes/create.view.php";