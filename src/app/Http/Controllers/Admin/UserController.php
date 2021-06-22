<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
  /**
   * Display user lists
   * 
   * @return \Illuminate\View\View
   */
  public function index()
  {
    $users = User::all();

    return view('admin.users', compact('users'));
  }

  /**
   * Block requested user
   * 
   * @return \Illuminate\Http\RedirectResponse
   */
  public function block(Request $request)
  {
    if (!auth('admin')->check()) {
      return redirect()->back()->with('error', 'You do not have permission.');
    }

    DB::transaction(function () use ($request) {
      $user = User::lockForUpdate()->findOrFail($request->input('user_id'));
      $user->status = UserStatus::BLOCKED;

      $user->save();
    });

    return redirect()->back()->with('success', 'User successfully blocked');
  }

  /**
   * Activate requested user
   * 
   * @return \Illuminate\Http\RedirectResponse
   */
  public function activate(Request $request)
  {
    if (!auth('admin')->check()) {
      return redirect()->back()->with('error', 'You do not have permission.');
    }

    DB::transaction(function () use ($request) {
      $user = User::lockForUpdate()->findOrFail($request->input('user_id'));
      $user->status = UserStatus::ACTIVATED;

      $user->save();
    });

    return redirect()->back()->with('success', 'User successfully activated');
  }
}
