<?php

namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'reference' => generateReference(),
            'category' => $this->faker->name(),
            'name' => $this->faker->name(),
            'level' => $this->faker->numberBetween(10, 100),
            'description' => $this->faker->text(200)
        ];
    }
}
