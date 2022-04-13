<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CourseWork;

class CourseWorkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseWork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'student_id' => $this->faker->numberBetween(-100000, 100000),
            'supervisor_id' => $this->faker->numberBetween(-100000, 100000),
            'type' => $this->faker->numberBetween(-1000, 1000),
            'status' => $this->faker->numberBetween(-1000, 1000),
            'name' => '{}',
        ];
    }
}
