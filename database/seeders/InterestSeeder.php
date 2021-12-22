<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Repository\Interests;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Interest::firstOrCreate(
            ['id' => 1],
            [
                'reference' => generateReference(),
                'name' => 'football',
                'description' =>  'I love playing football both on field and in video games'
            ]
        );
        Interest::firstOrCreate(
            ['id' => 2],
            [
                'reference' => generateReference(),
                'name' => 'Learning new tech',
                'description' =>  'I invest an ample of my time to learn new technologies so I can optimize existing ones',
            ]
        );
        Interest::firstOrCreate(
            ['id' => 3],
            [
                'reference' => generateReference(),
                'name' => 'reading/study/research',
                'description' => 'In my spare-time I read a books from different areas of life'
            ]
        );
        Interest::firstOrCreate(
            ['id' => 4],
            [
                'reference' => generateReference(),
                'name' => 'tourism',
                'description' => 'I enjoy travelling and tourism even though I am not yet a full blown tourist'
            ]
        );

        Interests::clearCache();
    }
}
