<?php

namespace App\Http\Controllers\User;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/**
	 * return login page
	 *
	 * @return View|RedirectResponse
	 */
	function index()
	{
		return view('auth.login');
	}

	/**
	 * login with crededntial info
	 *
	 * @return RedirectResponse
	 */
	function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email|exists:users',
			'password' => 'required|alphaNum|min:3'
		]);

		$userStatus = new UserStatus(User::fromEmail($request->input('email'))->first()->status);

		if ($userStatus->is(UserStatus::BLOCKED)) {
			return back()->with('error', 'This account is blocked. please contact us');
		}
		if ($userStatus->is(UserStatus::REQUESTED)) {
			return back()->with('error', 'This account is not activated now.');
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
	 * @return RedirectResponse
	 */
	function logout()
	{
		Auth::logout();
		return redirect()->route('home');
	}

	/**
	 * register page
	 *
	 * @return View
	 */
	function create()
	{
		return view('auth.register');
	}

	/**
	 * register new user
	 */
	function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|alphaNum|min:3'
		]);

		$user_data = array(
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'password' => Hash::make($request->get('password')),
			'status' => UserStatus::REQUESTED,
		);

		User::create($user_data);

		return redirect()->back()->with('success', 'Register requested, please wait admin\'s permission');
	}
}
