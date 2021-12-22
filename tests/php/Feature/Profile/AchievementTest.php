<?php

namespace Tests\Feature\Profile;

use App\Models\Achievement;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Lang;

class AchievementTest extends TestCase
{
    private string $baseUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->baseUrl = '/achievements';
    }

    private function createAchievements(): Model|Collection
    {
        WorkExperience::factory()->count(2)->create();
        return Achievement::factory()->count(2)->create();
    }

    public function testAchievementDelete()
    {
        $achievements = $this->createAchievements()->toArray();
        $id = $achievements[0]['id'];
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
