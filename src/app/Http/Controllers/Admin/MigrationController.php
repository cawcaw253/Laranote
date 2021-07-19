<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Migration;
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
        $migrations = Migration::all()->sortByDesc('id');

        return view('admin.migration', compact('migrations'));
    }

    /**
     * Run migrate command
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function migrate()
    {
        if (!auth('admin')->check()) {
            return redirect()->back()->with('error', 'You do not have permission.');
        }

        $migrations = Migration::all()->pluck('migration')->all();
        $files = array_slice(scandir(self::MIGRATION_DIR), 2);

        foreach ($files as $file) {
            if (!in_array($file, $migrations)) {
                Artisan::call('migrate', array('--path' => 'database/migrations/' . $file));
            }
        }

        return redirect()->back()->with('success', 'Successfully migrated');
    }
}
