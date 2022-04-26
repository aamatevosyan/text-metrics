<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CourseWork;
use App\Models\MonitoredMetricResult;

class MonitoredMetricResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MonitoredMetricResult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'course_work_id' => CourseWork::factory(),
            'results' => '{}',
            'softdeletes' => $this->faker->word,
        ];
    }
}
