<?php

namespace Tests\Feature\Profile;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Lang;

class SkillTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/skills';
    }

    private function createSkills(): Model|Collection
    {
        return Skill::factory()->count(2)->create();
    }

    public function testFetchSkill()
    {
        $this->createSkills();
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


    public function testSkillStorage()
    {
        $skill = Skill::factory()->make()->toArray();
        $response = $this->post($this->baseUrl, $skill, ['Accept' => 'Application/json']);
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

    public function testSkillErrors()
    {
        $skill = [];
        $response = $this->post($this->baseUrl, $skill, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                'status' => 'error',
                'errors' => [
                    [
                        'status' => 400,
                        'message' => 'category',
                        'detail' =>  'The category field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'name',
                        'detail' =>  'The name field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'level',
                        'detail' =>  'The level field is required.'
                    ]
                ]
            ]);
    }

    public function testSkillDelete()
    {
        $skills = $this->createSkills()->toArray();
        $id = $skills[0]['id'];
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
