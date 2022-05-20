<?php

namespace Database\Factories;

use App\Models\CourseWork;
use App\Models\Document;
use Domain\Metrics\Models\DocumentMetricResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentMetricResultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentMetricResult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'course_work_id' => CourseWork::factory(),
            'document_id' => Document::factory(),
            'results' => '{}',
            'detailed_results' => '{}',
            'softdeletes' => $this->faker->word,
        ];
    }
}
