<?php

namespace Tests\Feature\Profile;

use App\Models\Achievement;
use App\Models\Education;
use App\Models\Interest;
use App\Models\Skill;
use App\Models\Summary;
use App\Models\WorkExperience;
use Lang;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/profiles';
    }

    private function createProfiles()
    {
        Education::factory()->count(2)->create();
        Skill::factory()->count(2)->create();
        Interest::factory()->count(2)->create();
        Summary::factory()->count(2)->create();
        WorkExperience::factory()
            ->has(
                Achievement::factory()
                    ->count(2)
                    ->state(function (array $attributes, WorkExperience $experience) {
                        return ['work_experience_id' => $experience->id];
                    })
            )
            ->count(4)
            ->create();
    }

    public function testFetchProfiles()
    {
        $this->createProfiles();
        $response = $this->get($this->baseUrl, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'status' => 'success',
                    'data' => [
                        'success' => 'true',
                        'message' => Lang::get('general.fetch'),
                    ]
                ]
            );
    }
}
