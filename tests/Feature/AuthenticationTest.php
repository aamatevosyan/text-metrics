<?php

use App\Models\Student;
use App\Providers\RouteServiceProvider;

test('login screen can be rendered', function () {
    $response = $this->get(route('front.login'));

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $user = Student::factory()->create();

    $response = $this->post(route('front.login'), [
        'email' => $user->email,
        'password' => 'secret',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});

test('users cannot authenticate with invalid password', function () {
    $user = Student::factory()->create();

    $this->post(route('front.login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});
