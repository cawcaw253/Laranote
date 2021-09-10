<?php

namespace App\Http\Middleware\Note;

use App\Models\User;
use Closure;

class SetOwnerId
{
    const TARGET_PARAMETER = 'account';

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $account = request(self::TARGET_PARAMETER);
        if ($account) {
            $request->route()->forgetParameter(self::TARGET_PARAMETER);
        } else {
            return $next($request);
        }

        $ownerId = User::fromAccountName($account)->firstOrFail()->id;

        $request->merge(['ownerId' => $ownerId]);
        return $next($request);
    }
}
