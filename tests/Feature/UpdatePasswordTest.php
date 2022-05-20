<?php

use App\Models\Student;
use Illuminate\Support\Facades\Hash;

test('password can be updated', function () {
    $this->actingAs($user = Student::factory()->create());

    $response = $this->put(route('front.user-password.update'), [
        'current_password' => 'secret',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    expect(Hash::check('new-password', $user->fresh()->password))->toBeTrue();
});

test('current password must be correct', function () {
    $this->actingAs($user = Student::factory()->create());

    $response = $this->put(route('front.user-password.update'), [
        'current_password' => 'wrong-password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $response->assertSessionHasErrors();

    expect(Hash::check('secret', $user->fresh()->password))->toBeTrue();
});

test('new passwords must match', function () {
    $this->actingAs($user = Student::factory()->create());

    $response = $this->put(route('front.user-password.update'), [
        'current_password' => 'secret',
        'password' => 'new-password',
        'password_confirmation' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();

    expect(Hash::check('secret', $user->fresh()->password))->toBeTrue();
});
