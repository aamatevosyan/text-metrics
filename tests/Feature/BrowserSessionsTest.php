<?php

use App\Models\Student;

test('other browser sessions can be logged out', function () {
    $this->actingAs($user = Student::factory()->create());

    $response = $this->delete('/user/other-browser-sessions', [
        'password' => 'password',
    ]);

    $response->assertSessionHasNoErrors();
});
