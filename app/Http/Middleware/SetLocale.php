<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $supported = ['en', 'nl'];

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
        } else {
            $acceptLanguage = $request->header('Accept-Language', 'en');
            $preferred = strtolower(substr($acceptLanguage, 0, 2));
            $locale = in_array($preferred, $this->supported) ? $preferred : 'en';
        }

        App::setLocale($locale);

        return $next($request);
    }
}
