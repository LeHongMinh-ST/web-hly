<?php

namespace App\Http\Middleware;

use App\Enums\CacheEnum;
use App\Enums\Language;
use Closure;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $oldLocale = Cache::remember('old-locale', 300, function () {
            return Language::Vietnamese;
        });

        $currentLocale = app()->getLocale();

        if ($oldLocale != $currentLocale) {
            Cache::set('old-locale', $currentLocale);
            removeCaches([CacheEnum::PostNewHome, CacheEnum::PostFeatured]);
        }

        return $next($request);
    }
}
