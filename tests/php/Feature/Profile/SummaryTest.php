<?php

namespace Tests\Feature\Profile;

use App\Models\Summary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class SummaryTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/summary';
    }

    private function createSummaries(): Model|Collection
    {
        return Summary::factory()->count(2)->create();
    }

    public function testFetchSummary()
    {
        $this->createSummaries();
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


    public function testSummaryStorage()
    {
        $summary = Summary::factory()->make()->toArray();
        $response = $this->post($this->baseUrl, $summary, ['Accept' => 'Application/json']);
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

    public function testSummaryErrors()
    {
        $skill = [];
        $response = $this->post($this->baseUrl, $skill, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                'status' => 'error',
                'errors' => [
                    [
                        'status' => 400,
                        'message' => 'body',
                        'detail' =>  'The body field is required.'
                    ]
                ]
            ]);
    }

    public function testSummaryDelete()
    {
        $education = $this->createSummaries()->toArray();
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
