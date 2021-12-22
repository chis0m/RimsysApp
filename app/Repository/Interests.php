<?php

namespace App\Repository;

use App\Http\Resources\InterestResource;
use App\Models\Interest;
use App\Models\Summary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Interests
{
    public const CACHE_KEY = 'interests';

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
                        return InterestResource::collection(Interest::all());
                    }
                )
                ;
        } catch (\Exception $e) {
            return InterestResource::collection(Interest::all());
        }
    }

    public static function clearCache(): void
    {
        $cacheKey = self::CACHE_KEY;
        Cache::tags($cacheKey)->flush();
    }
}
