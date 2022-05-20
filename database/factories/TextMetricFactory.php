<?php

namespace Database\Factories;

use Domain\Metrics\Models\TextMetric;
use Domain\Metrics\Models\TextMetricComputer;
use Illuminate\Database\Eloquent\Factories\Factory;

class TextMetricFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TextMetric::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => '{}',
            'text_metric_computer_id' => TextMetricComputer::factory(),
            'description' => '{}',
            'slug' => $this->faker->slug,
            'numeric' => $this->faker->boolean,
            'monitored' => $this->faker->boolean,
            'softdeletes' => $this->faker->word,
        ];
    }
}
