<?php

namespace Database\Factories;

use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkExperience::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => generateReference(),
            'title' => $this->faker->name(),
            'company' => $this->faker->company(),
            'position' => $this->faker->name(),
            'stack' => $this->faker->name(),
            'start_year' => Carbon::now()->subMonths(9)->toDateString(),
            'end_year' => Carbon::now()->toDateString(),
            'till_present' => $this->faker->boolean(2),
            'image_url' => "/".$this->faker->name().".png",
        ];
    }
}
