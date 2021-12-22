<?php

namespace Database\Seeders;

use App\Models\Summary;
use App\Repository\Summaries;
use Illuminate\Database\Seeder;

class SummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body = 'Versatile and ambidextrous Software Engineer cum Solution Architect, with roughly 6 years of hands-on experience in architecting, building, optimizing, ' .
            'automating, and deploying mission-critical applications of different infrastructural dimensions. ' .
            'Below is an enumeration of my competencies:';
        $extra = "<li>Managing my time and the product with a great sense of ownership</li>" .
            "Team play, adaption, collaboration" .
            "<li>Test-driven development and behavior-driven development</li>".
            "<li>Debugging, refactoring, restructuring, and scaling a Laravel application</li>".
            "<li>Implement Best Practices and standards for a scalable software</li>"
            . "<li>Frontend architecting, coding, and optimization</li>" .
            "<li>Continuous integration and deployment</li>".
           "<li>Hosting a Laravel application on a server, lambda function/ Laravel vapor or Forge</li>" .
            "<li>Containers, pods, instances, virtualization, microservices</li>" .
            "<li>And more...</li>" .
            "<p><b>I look forward to joining your formidable team to build something great, something that matters.</b></p>";

        Summary::firstOrCreate(
            ['id' => 1],
            [
                'reference' => generateReference(),
                'body' => $body . $extra,
            ]
        );

        Summaries::clearCache();
    }
}
