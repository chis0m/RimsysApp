<?php

namespace App\Http\Controllers;

use App\Http\Resources\AchievementResource;
use App\Models\Achievement;
use App\Repository\WorkExperiences;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Lang;

class AchievementController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response|JsonResponse
     */
    public function destroy(int $id): Response|JsonResponse
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        WorkExperiences::clearCache();
        return $this->success(message: Lang::get('general.delete'), data: new AchievementResource($achievement));
    }
}
