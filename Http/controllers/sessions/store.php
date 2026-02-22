<?php

declare(strict_types=1);

use Core\Authenticator;
use Http\Forms\LoginForm;

//log in the user if the credentials match.
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// match the credentials
$signedIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);

if (!$signedIn) {
    $form->setError('password', 'No matching account for that email address and password.')
        ->throw();
}

redirect("/");