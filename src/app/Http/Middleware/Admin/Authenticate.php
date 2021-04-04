<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
		if (Auth::guard('users')->check()) {
			return redirect()->route('notes.index');
		}
		if (!Auth::guard('admin')->check()) {
			return redirect()->route('admin.auth.index');
		}
		return $next($request);
	}
}
