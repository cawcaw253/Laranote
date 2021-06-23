<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
        $path = "database/migrations";
        // dirToArray(public_path() . '/documents/ra_docs')
        $files = scandir('../database/migrations');
        dd($files);
        // $file = basename($path);         // $file is set to "index.php"
        Artisan::call('migrate', array('--path' => 'database/migrations'));
        return redirect()->back()->with('success', 'Successfully migrated');
    }
}
