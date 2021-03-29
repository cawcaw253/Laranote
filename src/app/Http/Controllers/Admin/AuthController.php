<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/**
	 * return login page
	 *
	 * @return \Illuminate\View\View
	 */
	function index()
	{
		return view('admin.login');
	}

	function test()
	{
		return view('admin.top');
	}

	/**
	 * login with crededntial info
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|alphaNum|min:3'
		]);

		$credentials = $request->only('email', 'password');

		if (Auth::guard('admin')->attempt($credentials)) {
			return redirect()->route('admin.test');
		}

		return back()->with('error', 'Wrong Login Details');
	}

	/**
	 * logout session
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('admin.index');
	}
}
