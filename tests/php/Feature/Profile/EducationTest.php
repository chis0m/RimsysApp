<?php

namespace Tests\Feature\Profile;

use App\Models\Education;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EducationTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/education';
    }

    private function createEducation(): Model|Collection
    {
        return Education::factory()->count(2)->create();
    }

    public function testFetchEducation()
    {
        $this->createEducation();
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

    public function testWorkEducationStorage()
    {
        $education = Education::factory()->make()->toArray();
        $response = $this->post($this->baseUrl, $education, ['Accept' => 'Application/json']);
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

    public function testEducationErrors()
    {
        $education = [];
        $response = $this->post($this->baseUrl, $education, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                'status' => 'error',
                'errors' => [
                    [
                        'status' => 400,
                        'message' => 'school',
                        'detail' =>  'The school field is required.'
                    ],
                    [
                        'status' => 400,
                        'message' => 'course',
                        'detail' =>  'The course field is required.'
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
                    ]
                ]
            ]);
    }

    public function testEducationDelete()
    {
        $education = $this->createEducation()->toArray();
        $id = $education[0]['id'];
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
