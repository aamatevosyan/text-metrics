<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CourseWork;
use App\Models\Document;
use App\Models\DocumentMetricResult;

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
