<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Supervisor;

class SupervisorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supervisor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'email_verified_at' => $this->faker->dateTime(),
            'password' => $this->faker->password,
            'remember_token' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'profile_photo_url' => $this->faker->regexify('[A-Za-z0-9]{2048}'),
            'two_factor_secret' => $this->faker->text,
            'two_factor_recovery_codes' => $this->faker->text,
        ];
    }
}
