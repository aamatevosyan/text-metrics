<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Section;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->numberBetween(-100000, 100000),
            'media_id' => $this->faker->numberBetween(-100000, 100000),
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name,
        ];
    }
}
