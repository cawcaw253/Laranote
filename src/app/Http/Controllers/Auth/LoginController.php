<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * return login page
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function index()
    {
        return Auth::check() ? redirect()->route('notes.index') : view('auth.login');
    }

    /**
     * login with crededntial info
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|alphaNum|min:3'
        ]);

        if (User::fromEmail($request->input('email'))->first()->isBlocked()) {
            return back()->with('error', 'This account is blocked. please contact us');
        }

        $credentials = $request->only('email', 'password');

        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('notes.index', auth()->id());
        }

        return back()->with('error', 'Wrong Login Details');
    }

    /**
     * logout session
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
