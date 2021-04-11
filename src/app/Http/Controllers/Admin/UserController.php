<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
   */
  public function block(Request $request)
  {
    dd($request, auth('admin')->user());
  }
}
