<?php

use App\Models\Student;

test('profile information can be updated', function () {
    $this->actingAs($user = Student::factory()->create());

    $response = $this->put(route('front.user-profile-information.update'), [
        'name' => 'Test Name',
        'email' => 'test@example.com',
    ]);

    expect($user->fresh())
        ->name->toEqual('Test Name')
        ->email->toEqual('test@example.com');
});
