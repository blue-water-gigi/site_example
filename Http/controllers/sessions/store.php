<?php

declare(strict_types=1);

use Core\Authenticator;
use Core\App;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

//log in the user if the credentials match.
$form = new LoginForm();

if ($form->validate($email, $password)) {
    // match the credentials
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect("/");
    }

    $form->setError('password', 'No matching account for that email address and password.');
}

return view('sessions/create.view.php', [
    'errors' => $form->getErrors(),
]);


