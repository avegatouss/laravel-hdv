<?php
namespace LaravelHdv\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use LaravelHdv\Support\HdvSettingsCache;

class EnsureHdvEnabled
{
    public function handle(Request $request, Closure $next)
    {
        $settings = HdvSettingsCache::snapshot();

        // TODO: lecture fine des scopes (site/org/geo/model) à l’étape 2
        $enabled = $settings->enabled;

        if (!$enabled) {
            return $settings->enforcement === 'deny_all_when_disabled'
                ? abort(503, 'Module HDV désactivé')
                : $next($request); // allow_all_when_disabled
        }

        return $next($request);
    }
}