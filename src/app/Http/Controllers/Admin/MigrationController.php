<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MigrationController extends Controller
{
    /**
     * migration index page
     *
     * @return \Illuminate\View\View
     */
    function index()
    {
        return view('admin.migration');
    }
}
