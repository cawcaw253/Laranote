<?php

namespace App\Http\Middleware\Note;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\URL;

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
        $this->setSubdomainParameter();

        $account = request(self::TARGET_PARAMETER);
        if (!$account) {
            return view('errors.404');
        }

        $ownerId = User::fromAccountName($account)->firstOrFail()->id;

        $request->route()->forgetParameter(self::TARGET_PARAMETER);
        $request->merge(['ownerId' => $ownerId]);

        return $next($request);
    }

    /**
     * set subdomain parameter in route
     *
     * @return void
     */
    private function setSubdomainParameter()
    {
        URL::defaults(['account' => request('account')]);
    }
}
