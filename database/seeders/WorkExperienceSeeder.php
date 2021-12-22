<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\WorkExperience;
use App\Repository\WorkExperiences;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $work = WorkExperience::firstOrCreate(
            ['id' => 1],
            [
                'reference' => generateReference(20),
                'company' => 'Credpal (YCW19)',
                'title' => 'Software/AWS Solutions Architect',
                'position' => 'Senior',
                'stack' => 'php,laravel,nodejs,python,DevOps Engineer',
                'start_year' => Carbon::parse('2019-11-01'),
                'end_year' => Carbon::now(),
                'till_present' => true,
                'image_url' => 'credpal.png',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 1],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Built Credit Card Billing System',
                'description' => 'Built and maintained a credit card billing system with a parallel debit wallet serving over 200,000 daily users'
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 2],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Loan System',
                'description' => 'Collaborated with an agile team of 4 to build a loan system'
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 3],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Microservices and Application SDK',
                'description' => 'Split system into microservices and built service SDKs (laravel) to foster integration on the legacy '
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 4],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Built Statement Generation Module.',
                'description' => 'Built Monthly transaction statement generation module to manage, track and report transactions with Laravel, NodeJs, Docker, AWS S3',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 5],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'AI for system tracking',
                'description' => 'Designed and built an intelligent system that tracks and notifies outages, shortages on the company’s third-party integration balances, and abnormally in users’ accounts.',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 6],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Spare-headed Integration to major third-party.',
                'description' => 'Spare-headed Integration to major third-party providers for bills, transactions, expense management, Email services, etc.',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 7],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Documentation, Design and Testing',
                'description' => 'Participated in different BDD formulations/documentations, automation with Behat and TDD with Pest and PHPUnit',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 8],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Built Credpal Front Suite',
                'description' => 'Built and deployed Frontend applications using VueJs - credpal.com, credpal retail, finance center with a team of 2',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 9],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work->id,
                'title' => 'Built Resume Platform',
                'description' => 'Built an online curriculum vitae management system cvloft for Pure Vantage (A Credpal Affiliate)',
            ]
        );


        $work2 = WorkExperience::firstOrCreate(
            ['id' => 10 ],
            [
                'reference' => generateReference(20),
                'company' => 'Telvida Int\'l Systems',
                'title' => 'Software Engineer',
                'position' => 'Mid',
                'stack' => 'php,laravel,nodejs,python',
                'start_year' => Carbon::parse('2018-05-01'),
                'end_year' => Carbon::parse('2019-05-01'),
                'image_url' => 'telvida.png',
            ]
        );

        Achievement::firstOrCreate(
            ['id' => 11],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work2->id,
                'title' => 'Enterprise Resource Planning',
                'description' => 'Collaborated with the engineering lead, business, and product team to architect and implement an in-house ERP system to manage and audit internal staff and system operations',
            ]
        );
        Achievement::firstOrCreate(
            ['id' => 12],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work2->id,
                'title' => 'Conference Room Automation System',
                'description' => 'Built and deployed a NodeJs based Conference Room IOT-Automation System to control Polycom GS700, Polycom Eagle Eye, Lutron Light, projector box and screen, NECTV M/X Series.',
            ]
        );
        Achievement::firstOrCreate(['id' => 13],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work2->id,
                'title' => 'Device Management platform',
                'description' => 'Built automation system web management platform',
            ]
        );

        Achievement::firstOrCreate(['id' => 14],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work2->id,
                'title' => 'Server Provisioning',
                'description' => 'Spare headed the provisioning of on-prem Linux servers, android minibox, large 4k signage monitors for presentation, testing and hosting',
            ]
        );

        $work3 = WorkExperience::firstOrCreate(
            ['id' => 3],
            [
                'reference' => generateReference(20),
                'company' => 'Andela.com',
                'title' => 'Software Engineer',
                'position' => 'Training',
                'stack' => 'NodeJs,Typescript,React',
                'start_year' => Carbon::parse('2019-05-01'),
                'end_year' => Carbon::parse('2019-11-01'),
                'image_url' => 'andela.com.png',
            ]
        );

        Achievement::firstOrCreate(
            ['id' => 15],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work3->id,
                'title' => 'Built Multi-tenant application',
                'description' => 'Collaborated with a team of 7 to build NodeJs and ReactJs based multi-tenant booking and traveling application',
            ]
        );

        Achievement::firstOrCreate(
            ['id' => 16],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work3->id,
                'title' => 'Built AutoMart',
                'description' => 'Built a card dealership application with vanilla Javascript and NodeJs - AutoMart',
            ]
        );

        $work4 = WorkExperience::firstOrCreate(
            ['id' => 17],
            [
                'reference' => generateReference(20),
                'company' => 'Tutor.Ng',
                'title' => 'Software Engineer',
                'position' => 'Junior',
                'stack' => 'php,laravel,Javascript,CodeIgniter',
                'start_year' => Carbon::parse('2016-04-01'),
                'end_year' => Carbon::parse('2017-1-01'),
                'image_url' => 'tutor.ng.png',
            ]
        );

        Achievement::firstOrCreate(['id' => 18],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work4->id,
                'title' => 'Improved CTR by 12%',
                'description' => 'Implemented the second Iteration on a training platform for registering and training minors in computer-related courses which improved CTR by 12%',
            ]
        );

        Achievement::firstOrCreate(['id' => 19],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work4->id,
                'title' => 'Built Emerge Hub',
                'description' => 'Collaborated with the business development team to build a Coworking space subscription and management application – Emerge Hub',
            ]
        );

        Achievement::firstOrCreate(['id' => 20],
            [
                'reference' => generateReference(20),
                'work_experience_id' => $work4->id,
                'title' => 'Maintenance and Standardization',
                'description' => 'Responsible for maintaining set of educational products of the firm',
            ]
        );

        WorkExperiences::clearCache();
    }
}
