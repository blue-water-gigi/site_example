<?php

declare(strict_types=1);

namespace Core;

class Authenticator
{
    public function attempt(string $email, string $password): bool
    {

        //tracking down the user
        $user = App::resolve(Database::class)
            ->query('SELECT * FROM users WHERE email = :email', [
                'email' => $email,
            ])->find();

        // we a have a user but dont know if the pass provided mathes the DB one
        if ($user) {
            if (password_verify($password, $user['password'])) {

                $this->login([
                    'email' => $email,
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user): void
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout(): void
    {
        Session::destroy();
    }
}