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
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * return login page
     *
     * @return View|RedirectResponse
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * login with crededntial info
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users',
            'password' => 'required|alphaNum|min:3'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('users')->attempt($credentials)) {
            return response()->json([
                'status' => 'success',
                'redirect_url' => route('notes.index'),
            ]);
        }

        $userStatus = new UserStatus(User::fromEmail($request->input('email'))->first()->status);

        $errorMessage = "Wrong Login Details";
        if ($userStatus->is(UserStatus::BLOCKED)) {
            $errorMessage = 'This account is blocked. please contact us';
        } else if ($userStatus->is(UserStatus::REQUESTED)) {
            $errorMessage = 'This account is not activated now.';
        }

        return response()->json([
            'status' => 'error',
            'errors' => $errorMessage,
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * logout session
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login.view');
    }

    /**
     * register page
     *
     * @return View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * register new user
     *
     * @param Request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|alphaNum|min:3'
        ]);

        $userData = array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'status' => UserStatus::REQUESTED,
        );

        User::create($userData);

        $request->session()->flash('isRequested', 'Register requested, please wait admin\'s permission');

        return response()->json([
            'status' => 'success',
            'redirect_url' => route('auth.login.view'),
        ]);
    }
}
