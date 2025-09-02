<?php
namespace LaravelHdv\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use LaravelHdv\Support\HdvSettingsCache;

class ModuleController extends Controller
{
    public function index()
    {
        $s = HdvSettingsCache::snapshot();

        return view('hdv::admin.modules.index', [
            'module' => [
                'name' => 'laravel-hdv',
                'enabled' => $s->enabled,
                'enforcement' => $s->enforcement,
                'scopes' => $s->scopes,
            ],
        ]);
    }
}