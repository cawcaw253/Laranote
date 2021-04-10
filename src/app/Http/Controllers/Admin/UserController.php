<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
  /**
   * Display user lists
   * 
   * @return \Illuminate\View\View
   */
  public function index()
  {
    return view('admin.users');
  }
}
