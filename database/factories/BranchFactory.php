<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\BranchType;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            '_lft' => $this->faker->numberBetween(-100000, 100000),
            '_rgt' => $this->faker->numberBetween(-100000, 100000),
            'branch_type_id' => BranchType::factory(),
            'name' => '{}',
        ];
    }
}
