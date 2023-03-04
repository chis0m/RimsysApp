<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Repository\Skills;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::firstOrCreate(
            ['id' => 1],
            [
                'reference' => generateReference(),
                'category' => 'backend',
                'name' => 'Laravel/PHP',
                'level' => 92,
                'description' => 'Very proficient with laravel with over 5 years of experience',
            ]
        );
        Skill::firstOrCreate(
            ['id' => 2],
            [
                'reference' => generateReference(),
                'category' => 'backend',
                'name' => 'Node Js',
                'level' => 71,
                'description' => 'Worked with NodeJs TCP/Network/HTTP modules to solve problems'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 3],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'python',
                'level' => 68,
                'description' => 'Used python to write deployment scripts'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 4],
            [
                'reference' => generateReference(),
                'category' => 'backend',
                'name' => 'Postgres/MySQL',
                'level' => 84,
                'description' => 'I have used postgres and mysql databases to build very scalable applications'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 5],
            [
                'reference' => generateReference(),
                'category' => 'laravel ecosystem',
                'name' => 'Laravel Vapor/Forge',
                'level' => 78,
                'description' => 'Hosted our high-end applications on vapor and forge to ensure availability, scalability and cost Optimization'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 6],
            [
                'reference' => generateReference(),
                'category' => 'laravel ecosystem',
                'name' => 'Laravel Dev Suit',
                'level' => 83,
                'description' => 'Use these during development to ensure better code is written - Sail, Horizon, Telescope'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 7],
            [
                'reference' => generateReference(),
                'category' => 'laravel ecosystem',
                'name' => 'Laravel Octane',
                'level' => 90,
                'description' => 'Use laravel octane to boost application speed'
            ]
        );


        Skill::firstOrCreate(
            ['id' => 8],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'Nginx/PHP-FPM',
                'level' => 78,
                'description'=> 'Have optimized nginx and fpm integration to scale our application',
            ]
        );

        Skill::firstOrCreate(
            ['id' => 9],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'linux',
                'level' => 77,
                'description' => 'Proficient with Linux administration',
            ]
        );
        Skill::firstOrCreate(
            ['id' => 10],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'kubernetes',
                'level' => 63,
                'description' => 'Proficient with build and deploying pods/containers to kubernetes cluster'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 11],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'Docker',
                'level' => 67,
                'description' => 'Proficient with building and deploying docker containers'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 12],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'Javascript',
                'level' => 88,
                'description' => 'Have built several applications with vanilla JavaScript'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 13],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'vue js',
                'level' => 93,
                'description' => 'Proficient with VueJs'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 14],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'Nuxt js',
                'level' => 72,
                'description' => 'Proficient with Nuxt Js'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 15],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'TypeScript',
                'level' => 76,
                'description' => 'Proficient with TypeScript Js'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 16],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'Html/CSS',
                'level' => 97,
                'description' => 'Very proficient with using Html, Css and implementing design patterns like BEM'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 17],
            [
                'reference' => generateReference(),
                'category' => 'Operations',
                'name' => 'Jira',
                'level' => 66,
                'description' => 'setup Jira and integrated with github/gitlab operations'
            ]
        );
        Skill::firstOrCreate(
            ['id' => 18],
            [
                'reference' => generateReference(),
                'category' => 'Data/Monitoring',
                'name' => 'Metabase',
                'level' => 62,
                'description' => 'setup and worked with metabase for monitoring data from database'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 19],
            [
                'reference' => generateReference(),
                'category' => 'Data/Monitoring',
                'name' => 'ELK',
                'level' => 58,
                'description' => 'setup and worked with Logstash and Kibana'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 20],
            [
                'reference' => generateReference(),
                'category' => 'Testing',
                'name' => 'TDD/BDD',
                'level' => 72,
                'description' => 'Efficient in writing test/behavior driven development using PHPUnit and Behat'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 21],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'CI/CD/Jenkins',
                'level' => 58,
                'description' => 'Efficient in implementing continuous integration and deployment scripts'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 22],
            [
                'reference' => generateReference(),
                'category' => 'devops',
                'name' => 'GitOps',
                'level' => 82,
                'description' => 'Proficient with github actions and gitlab runners'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 23],
            [
                'reference' => generateReference(),
                'category' => 'cloud',
                'name' => 'AWS Cloud',
                'level' => 85,
                'description' => 'Couple with AWS Solutions Architect certificate in view - ' .
                    'I can optimize your infrastructure to ensure optimized cost, resilience, high availability, scalability etc'
            ]
        );

        Skill::firstOrCreate(
            ['id' => 24],
            [
                'reference' => generateReference(),
                'category' => 'frontend',
                'name' => 'TailwindCSS',
                'level' => 89,
                'description' => 'I have used tailwind utilities and components to build on different projects'
            ]
        );

        Skills::clearCache();
    }
}
