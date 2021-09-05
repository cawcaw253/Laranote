<?php

namespace App\View\Composers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserNoteComposer
{
    /**
     * The user repository implementation.
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     * Create a new profile composer.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        logger($request->all());
        // $this->user = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        // $view->with('', $this->users->count());
    }
}
