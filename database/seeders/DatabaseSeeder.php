<?php

namespace Database\Seeders;

use Artisan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(WorkExperienceSeeder::class);
        $this->call(SummarySeeder::class);
        $this->call(EducationSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(InterestSeeder::class);
        Artisan::call('cache:clear');
    }
}
