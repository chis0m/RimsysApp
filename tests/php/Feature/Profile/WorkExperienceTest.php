<?php

namespace Tests\Feature\Profile;

use App\Models\Achievement;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class WorkExperienceTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/experiences';
    }

    private function createWorkExperiences(): Model|Collection
    {
        return WorkExperience::factory()
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

    public function testFetchWorkExperience()
    {
        $this->createWorkExperiences();
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
        $response->assertJsonStructure([
            'status',
            'benchmark',
            'query' => ['options', 'params'],
            'data' => [
                'success',
                'type',
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'reference',
                        'company',
                        'position',
                        'title',
                        'stack',
                        'start_year',
                        'end_year',
                        'till_present',
                        'achievements' => [
                            '*' => [
                                'id',
                                'reference',
                                'work_experience_id',
                                'title',
                                'description'
                            ]
                        ],
                    ]
                ]
            ]
        ]);
    }

    public function testWorkExperienceStorage()
    {
        $experience = WorkExperience::factory()->make()->toArray();
        $response = $this->post($this->baseUrl, $experience, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'status' => 'success',
                    'data' => [
                        'success' => 'true',
                        'message' => Lang::get('general.store'),
                    ]
                ]
            );
    }

    public function testWorkExperienceAndAchievementStorage()
    {
        $experience = WorkExperience::factory()->count(1)->make()->toArray();
        $achievements = Achievement::factory()->count(3)->make()->toArray();
        $experience[0]['achievements'] = $achievements;
        $response = $this->post($this->baseUrl, $experience[0], ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'status' => 'success',
                    'data' => [
                        'success' => 'true',
                        'message' => Lang::get('general.store'),
                    ]
                ]
            );
        $response->assertJsonStructure([
            'status',
            'benchmark',
            'query' => ['options', 'params'],
            'data' => [
                'success',
                'type',
                'message',
                'data' => [
                    'id',
                    'reference',
                    'company',
                    'title',
                    'position',
                    'stack',
                    'start_year',
                    'end_year',
                    'till_present',
                    'achievements' => [
                        '*' => [
                            'id',
                            'reference',
                            'work_experience_id',
                            'title',
                            'description'
                        ]
                    ],
                ]
            ]
        ]);
    }

    public function testWorkExperienceErrors()
    {
        $experience = [];
        $response = $this->post($this->baseUrl, $experience, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                'status' => 'error',
                'errors' => [
                    [
                        'status' => 400,
                        'message' => 'company',
                        'detail' =>  'The company field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'title',
                        'detail' =>  'The title field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'position',
                        'detail' =>  'The position field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'start_year',
                        'detail' =>  'The start year field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'end_year',
                        'detail' =>  'The end year field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'till_present',
                        'detail' =>  'The till present field is required.'
                    ]
                ]
            ]);
    }

    public function testWorkExperienceDelete()
    {
        $experiences = $this->createWorkExperiences()->toArray();
        $id = $experiences[0]['id'];
        $url = $this->baseUrl . "/{$id}";
        $response = $this->delete($url, [], ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'status' => 'success',
                    'data' => [
                        'success' => 'true',
                        'message' => Lang::get('general.delete'),
                    ]
                ]
            );
    }
}
