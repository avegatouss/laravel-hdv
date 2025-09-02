<?php
namespace LaravelHdv\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use LaravelHdv\Http\Middleware\EnsureHdvEnabled;
use LaravelHdv\Support\HdvSettingsCache;
use Spatie\LaravelSettings\Events\SavingSettings;

class HdvServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/hdv.php', 'hdv');
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../config/hdv.php' => config_path('hdv.php'),
        ], 'hdv-config');

        $this->loadRoutesFrom(__DIR__.'/../routes/app.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/admin.php');

        // Alias middleware
        $this->app['router']->aliasMiddleware('ensure.hdv', EnsureHdvEnabled::class);

        // Invalidate snapshot cache on settings save
        $this->app['events']->listen(SavingSettings::class, function () {
            HdvSettingsCache::invalidate();
        });
    }
}