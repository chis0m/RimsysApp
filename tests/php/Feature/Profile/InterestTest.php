<?php

namespace Tests\Feature\Profile;

use App\Models\Interest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Lang;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class InterestTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/interests';
    }

    private function createInterests(): Model|Collection
    {
        return Interest::factory()->count(2)->create();
    }

    public function testFetchInterest()
    {
        $this->createInterests();
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


    public function testInterestStorage()
    {
        $interest = Interest::factory()->make()->toArray();
        $response = $this->post($this->baseUrl, $interest, ['Accept' => 'Application/json']);
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

    public function testInterestErrors()
    {
        $interest = [];
        $response = $this->post($this->baseUrl, $interest, ['Accept' => 'Application/json']);
        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson([
                'status' => 'error',
                'errors' => [
                    [
                        'status' => 400,
                        'message' => 'name',
                        'detail' =>  'The name field is required.'
                    ]
                ]
            ]);
    }

    public function testInterestDelete()
    {
        $interests = $this->createInterests()->toArray();
        $id = $interests[0]['id'];
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
