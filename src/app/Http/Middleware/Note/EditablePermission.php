<?php

namespace App\Http\Middleware\Note;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class EditablePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestId = intval($request->route('userId'));
        if ($requestId !== auth()->id()) {
            return redirect()->route('errors', ['code' => 403]);
        }
        return $next($request);
    }
}
