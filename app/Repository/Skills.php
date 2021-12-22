<?php

namespace App\Repository;

use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Skills
{
    public const CACHE_KEY = 'skills';

    public static function index()
    {
        $key = 'index';
        $cacheKey = self::CACHE_KEY;
        try {
            return Cache::tags($cacheKey)
                ->remember(
                    $key,
                    Carbon::now()->addMinutes(30),
                    static function () {
                        return SkillResource::collection(Skill::all());
                    }
                )
                ;
        } catch (\Exception $e) {
            return SkillResource::collection(Skill::all());
        }
    }

    public static function clearCache(): void
    {
        $cacheKey = self::CACHE_KEY;
        Cache::tags($cacheKey)->flush();
    }
}
