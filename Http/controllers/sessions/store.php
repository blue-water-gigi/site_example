<?php

declare(strict_types=1);


//log in the user if the credentials match.
use Core\Database;
use Core\Validator;
use Core\App;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('sessions/create.view.php', [
        'errors' => $form->getErrors(),
    ]);
}

// match the credentials

$db = App::resolve(Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->find();


// we a have a user but dont know if the pass provided mathes the DB one
if ($user) {
    if (password_verify($password, $user['password'])) {

        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }
}

return view('sessions/create.view.php', [
    'errors' => [
        'password' => 'No matching account for that email address and password.',
    ]
]);


