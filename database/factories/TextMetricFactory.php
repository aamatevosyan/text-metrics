<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TextMetric;
use App\Models\TextMetricComputer;

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
