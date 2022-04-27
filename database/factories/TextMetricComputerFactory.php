<?php

namespace Database\Factories;

use Domain\Metrics\Models\TextMetricComputer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextMetricComputerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TextMetricComputer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'class' => $this->faker->word,
            'softdeletes' => $this->faker->word,
        ];
    }
}
