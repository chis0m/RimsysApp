<?php

namespace App\Repository;

use App\Http\Resources\EducationResource;
use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Educations
{
    public const CACHE_KEY = 'educations';

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
                        return EducationResource::collection(Education::all());
                    }
                )
                ;
        } catch (\Exception $e) {
            return EducationResource::collection(Education::all());
        }
    }

    public static function clearCache(): void
    {
        $cacheKey = self::CACHE_KEY;
        Cache::tags($cacheKey)->flush();
    }
}
