<?php

use App\Models\Student;
use Laravel\Jetstream\Features;

test('confirm password screen can be rendered', function () {
    $user = Features::hasTeamFeatures()
                    ? Student::factory()->withPersonalTeam()->create()
                    : Student::factory()->create();

    $response = $this->actingAs($user)->get(route('front.password.confirm'));

    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    $user = Student::factory()->create();

    $response = $this->actingAs($user)->post(route('front.password.confirm'), [
        'password' => 'secret',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    $user = Student::factory()->create();

    $response = $this->actingAs($user)->post(route('front.password.confirm'), [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
