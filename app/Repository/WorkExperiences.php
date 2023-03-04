<?php

namespace App\Repository;

use App\Http\Resources\WorkExperienceResource;
use App\Models\WorkExperience;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class WorkExperiences
{
    public const CACHE_KEY = 'experiences';

    public static function index()
    {
        $key = 'experiences';
        $cacheKey = self::CACHE_KEY;
        try {
            return Cache::tags($cacheKey)
                ->remember(
                    $key,
                    Carbon::now()->addMinutes(30),
                    static function () {
                        return WorkExperienceResource::collection(WorkExperience::with('achievements')->get());
                    }
                )
                ;
        } catch (\Exception $e) {
            return WorkExperienceResource::collection(WorkExperience::with('achievements')->get());
        }
    }

    public static function clearCache(): void
    {
        $cacheKey = self::CACHE_KEY;
        Cache::tags($cacheKey)->flush();
    }
}
