<?php

namespace Database\Factories;

use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Education::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'reference' => generateReference(),
            'school' => $this->faker->company(),
            'course' => $this->faker->name(),
            'start_year' => Carbon::now()->subMonths(9)->toDateString(),
            'end_year' => Carbon::now()->toDateString(),
        ];
    }
}
