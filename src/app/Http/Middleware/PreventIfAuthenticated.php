<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventIfAuthenticated
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
    if (Auth::guard('users')->check() || Auth::guard('admin')->check()) {
      return redirect()->to(route('notes.index', ['account' => Auth::user()->account_name]));
    }
    return $next($request);
  }
}
