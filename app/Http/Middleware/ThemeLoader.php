<?php

namespace App\Http\Middleware;

use Closure;
use Hexadog\ThemesManager\Http\Middleware\ThemeLoader as HexadogThemeLoader;

class ThemeLoader extends HexadogThemeLoader
{
    public function handle($request, Closure $next, $theme = null)
    {
        // Check if request url starts with admin prefix
        // if ($request->segment(1) === 'home') {
            // Set a specific theme for matching urls
            $theme = 'dexignzone/ombe';
        // }


        // Call parent Middleware handle method
        return parent::handle($request, $next, $theme);
    }
}
