<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
	/**
	 * return login page
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.login');
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
			return redirect()->route('admin.user.index');
		}

		return back()->with('error', 'Wrong Login Details');
	}

	/**
	 * logout session
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout(Request $request)
	{
		Auth::logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect()->route('admin.auth.index');
	}

	/**
	 * test route
	 */
	public function test()
	{
		logger()->error(sprintf("500 error test - File: %s - Line: %d", __FILE__, __LINE__));
		return abort(Response::HTTP_INTERNAL_SERVER_ERROR, '500 error test route');
	}
}
