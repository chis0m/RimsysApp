<?php

namespace Database\Factories;

use App\Models\Achievement;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class AchievementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Achievement::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'reference' => generateReference(),
            'work_experience_id' => 1,
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(120),
        ];
    }
}
