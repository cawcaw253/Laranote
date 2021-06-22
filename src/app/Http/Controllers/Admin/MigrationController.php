<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    /**
     * migration index page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.migration');
    }

    /**
     * Run migrate command
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function migrate(Request $request)
    {
        return redirect()->back()->with('success', 'Successfully migrated');
    }
}
