<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConvertBanglaDigitsToEnglish
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $input = $request->all();
        if (!empty($input)) {
            array_walk_recursive($input, function (&$value) {
                if (is_string($value)) {
                    $value = $this->convertBanglaToEnglish($value);
                }
            });
            $request->merge($input);
        }

        return $next($request);
    }

    private function convertBanglaToEnglish(string $str): string
    {
        $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($bn, $en, $str);
    }
}
