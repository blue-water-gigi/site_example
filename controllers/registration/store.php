<?php

declare(strict_types=1);

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}
if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password at least 7 characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

//check if theres already a account
$db = App::resolve(Database::class);

$check = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();

// if yes,redirect to a login page
if ($check) {
    //someone with that email is already exists
    header('location: /');
} else {
    // if not, save one to DB and then log the user in and redirect to main
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);

    //mark that the user has logged in and reddirect.
    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');
    exit();
}




