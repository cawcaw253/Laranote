<?php

namespace App\Http\Middleware\Note;

use Closure;
use Illuminate\Support\Facades\URL;

class SetSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        URL::defaults(['account' => request('account')]);
        return $next($request);
    }
}
