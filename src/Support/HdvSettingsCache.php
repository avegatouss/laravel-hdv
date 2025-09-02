<?php

namespace LaravelHdv\Support;

use Illuminate\Support\Facades\Cache;
use LaravelHdv\Settings\HdvSettings;

class HdvSettingsCache
{
    public static function snapshot(): HdvSettings
    {
        return Cache::remember(config('hdv.cache.key'), config('hdv.cache.ttl'), function () {
            return app(HdvSettings::class);
        });
    }

    public static function invalidate(): void
    {
        Cache::forget(config('hdv.cache.key'));
    }
}
