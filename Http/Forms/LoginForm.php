<?php

declare(strict_types=1);

namespace Http\Forms;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate(string $email, string $password): bool
    {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

        return empty($errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError(string $field, string $error): void
    {
        $this->errors[$field] = $error;
    }
}