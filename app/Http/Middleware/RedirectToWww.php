<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToWww
{
    public function handle($request, Closure $next)
    {
        if (strpos(url()->current(), 'www.') === false) {
            $url = 'https://www.' . $request->getHttpHost() . $request->getRequestUri();

            return redirect()->to($url, 301);
        }

        return $next($request);
    }
}
