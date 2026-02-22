<?php

declare(strict_types=1);

namespace Http\Forms;
use Core\Validator;
use Core\ValidationException;

class LoginForm
{
    protected array $errors = [];
    // public array $attributes = [];

    public function __construct(public array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }


    public static function validate(array $attributes): mixed
    {
        $instance = new static($attributes);

        return $instance->getErrors() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function hasErrors(): bool
    {
        return (bool) count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError(string $field, string $error): static
    {
        $this->errors[$field] = $error;

        return $this;
    }
}