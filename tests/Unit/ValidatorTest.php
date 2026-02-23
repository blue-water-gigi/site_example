<?php

use Core\Authenticator;
use Core\Validator;

test('it validates the string', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});


test('it validates the string with min length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

test('it validates an email', function () {
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});

test('validates that a number is greater than given amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 1000))->toBeFalse();
});

test('can we login the user', function () {
    //create a user in session
    $user = ['id' => '1', 'email' => 'admin@mail.com'];

    new Authenticator()->login($user);

    expect($_SESSION['user']['email'])->toBe($user['email']);

    //FAIL cuz id is not putted into session with login method, only mail
    expect($_SESSION['user']['id'])->toBeNull();
});