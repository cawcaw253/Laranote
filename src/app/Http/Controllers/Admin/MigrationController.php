<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrationController extends Controller
{
    const MIGRATION_DIR = '../database/migrations';

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
        $files = array_slice(scandir(self::MIGRATION_DIR), 2);
        foreach ($files as $file) {
            logger()->info($file);
        }
        // $file = basename($path);         // $file is set to "index.php"
        Artisan::call('migrate', array('--path' => 'database/migrations'));
        return redirect()->back()->with('success', 'Successfully migrated');
    }
}
