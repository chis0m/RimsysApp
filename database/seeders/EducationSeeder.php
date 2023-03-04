<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Repository\Educations;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::firstOrcreate(
            ['id' => 1],
            [
                'reference' => generateReference(),
                'school' => 'Nnamdi Azikiwe University',
                'course' => 'Electronics and Computer Engineering',
                'start_year' => Carbon::parse('2011-08-01'),
                'end_year' => Carbon::parse('2016-08-01'),
            ]
        );
        Education::firstOrcreate(
            ['id' => 2],
            [
                'reference' => generateReference(),
                'school' => 'Treten Academy',
                'course' => 'AWS Solution Architect',
                'start_year' => Carbon::parse('2021-08-01'),
                'end_year' => Carbon::parse('2024-08-01'),
            ]
        );
        Education::firstOrcreate(
            ['id' => 3],
            [
                'reference' => generateReference(),
                'school' => 'Global Virtual Nigeria',
                'course' => 'RedHat Linux Administration',
                'start_year' => Carbon::parse('2015-08-01'),
                'end_year' => Carbon::parse('2016-08-01'),
            ]
        );

        Education::firstOrcreate(
            ['id' => 4],
            [
                'reference' => generateReference(),
                'school' => 'Alabian Solution',
                'course' => 'Digital Marketing | Fullstack Engineer',
                'start_year' => Carbon::parse('2015-01-01'),
                'end_year' => Carbon::parse('2015-04-01'),
            ]
        );


        Educations::clearCache();
    }
}
