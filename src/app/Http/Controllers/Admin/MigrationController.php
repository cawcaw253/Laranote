<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Migration;
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
        if (!auth('admin')->check()) {
            return redirect()->back()->with('error', 'You do not have permission.');
        }

        $migratedList = Migration::getMigratedList();
        $files = array_slice(scandir(self::MIGRATION_DIR), 2);

        foreach ($files as $file) {
            if (in_array($file, $migratedList)) {
                Artisan::call('migrate', array('--path' => 'database/migrations/' . $file));
            }
        }

        return redirect()->back()->with('success', 'Successfully migrated');
    }
}
