<?php

namespace App\Repository;

use App\Http\Resources\SummaryResource;
use App\Models\Summary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Summaries
{
    public const CACHE_KEY = 'summaries';

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
                        return SummaryResource::collection(Summary::all());
                    }
                )
                ;
        } catch (\Exception $e) {
            return SummaryResource::collection(Summary::all());
        }
    }

    public static function clearCache(): void
    {
        $cacheKey = self::CACHE_KEY;
        Cache::tags($cacheKey)->flush();
    }
}
